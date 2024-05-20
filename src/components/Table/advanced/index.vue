<template>
  <div class="flex flex-col p-4 bg-white rounded-md dark:bg-slate-800 z-10 relative" v-if="tableData">
      <div
        class="md:flex justify-between pb-6 md:space-y-0 space-y-3 items-center z-10 relative"
      >
        <h5>{{ tableInformation.title }}</h5>
        <div class="flex gap-4">
          <InputGroup
            v-model="searchTerm"
            placeholder="Search"
            type="text"
            prependIcon="heroicons-outline:search"
            merged
          />
          <div class="flex gap-3 w-1/4">
              <router-link 
                  :to="`/${query.urlHeader}/create`" class="w-full">
                  <Button type="submit" text="Crear" btnClass="btn-primary" class="w-full h-10 items-center">Crear</Button>
              </router-link>
              <router-link :to="{ path: '/refresh', query: { urlHeader: query.urlHeader } }" class="w-full">
                  <Button type="submit" text="Refrescar" btnClass="btn-secondary" class="w-full h-10 items-center" @click="refreshToast()">Refrescar</Button>
              </router-link>
          </div>
        </div>
      </div>

      <vue-good-table
        :columns="columns"
        styleClass=" vgt-table bordered centered"
        :rows="tableData"
        :pagination-options="{
          enabled: true,
          perPage: perpage,
        }"
        :search-options="{
          enabled: true,
          externalQuery: searchTerm,
        }"
        :select-options="{
          enabled: true,
          selectOnCheckboxOnly: true, 
          selectioninfoClass: 'custom-class',
          selectionText: 'rows selected',
          clearSelectionText: 'clear',
          disableSelectinfo: true, 
          selectAllByGroup: true,
        }"
      >
        <template v-slot:table-row="props">
          <span v-if="props.column.field == 'action'">
            <Dropdown classMenuItems=" w-[140px]">
              <span class="text-xl"><Icon icon="heroicons-outline:dots-vertical"/></span>
              <template v-slot:menus>
                <MenuItem v-for="(item, i) in actions" :key="i" style="top: -50px; left: -10px">
                  <template v-if="item.name != 'delete'">
                    <router-link :to="item.name == 'view' ? `/${tableInformation.headUrl}/${props.row.id}` : (item.name == 'edit' ? `/${tableInformation.headUrl}/${props.row.id}/edit` : '')">
                      <div :class="`${
                        item.name === 'delete'
                          ? 'bg-danger-500 text-danger-500 bg-opacity-30 hover:bg-opacity-100 hover:text-white'
                          : 'hover:bg-slate-900 hover:text-white dark:hover:bg-slate-600 dark:hover:bg-opacity-50' 
                        }
                        w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm  last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex  space-x-2 items-center rtl:space-x-reverse`"
                      >
                        <span class="text-base"><Icon :icon="item.icon"/></span>
                        <span>{{ item.name }}</span>
                      </div>
                    </router-link>
                  </template>
                  <template v-else>
                    <button @click="displayConfirmMessage(item.name, props.row.id)" class="bg-danger-500 text-danger-500 bg-opacity-30 hover:bg-opacity-100 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm  last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex  space-x-2 items-center rtl:space-x-reverse">
                      <span class="text-base"><Icon :icon="item.icon"/></span>
                      <span>{{ item.name }}</span>
                    </button>
                  </template>
                </MenuItem>
              </template>
            </Dropdown>
          </span>
        </template>
        <template #pagination-bottom="props">
          <div class="py-4 px-3">
            <Pagination
              :total="tableData.length"
              :current="current"
              :per-page="perpage"
              :pageRange="pageRange"
              @page-changed="current = $event"
              :pageChanged="props.pageChanged"
              :perPageChanged="props.perPageChanged"
              enableSearch
              enableSelect
              :options="options"
            >
              >
            </Pagination>
          </div>
        </template>
      </vue-good-table>
      <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessage">
          <Card title="Se requiere confirmación" class="text-center" noborder>
              <span class="dark:text-white">
                Estas a punto de eliminar una entidad de la base de datos.<br>
                ¿Estás seguro que quieres continuar?
              </span>
              <div class="mt-9 flex justify-evenly">
                  <Button btnClass="btn-primary" text="Confirmar" @click="deleteParticipant()" />
                  <Button btnClass="btn-dark" text="Cancelar" @click="hideConfirmMessage()" />
              </div>
          </Card>
      </div>
  </div>
</template>
<script>
import Card from "@/components/Card";
import Button from "@/components/Button";
import Dropdown from "@/components/Dropdown";
import Icon from "@/components/Icon";
import InputGroup from "@/components/InputGroup";
import Pagination from "@/components/Pagination";
import { MenuItem } from "@headlessui/vue";
import { advancedTable } from "../../../constant/basic-tablle-data";
import { useToast } from "vue-toastification";
import axios from "@/plugins/axios";
import router from '../../../router';

import { ref } from "vue" 
export default {
  components: {
    Pagination,
    InputGroup,
    Dropdown,
    Icon,
    MenuItem,
    Card,
    Button,
  },
  props: {
    tableInformation: Object,
    tableData: Object,
    urlMainHeader: {
      type: String,
    }
  },
  data(props) {
    return {
      advancedTable,
      current: 1,
      perpage: props.tableInformation.rows,
      pageRange: 3,
      searchTerm: "",
      actions: [
        {
          name: "view",
          icon: "heroicons-outline:eye",
          direction_name: props.tableInformation.headUrl,
        },
        {
          name: "edit",
          icon: "heroicons:pencil-square",
          direction_name: props.tableInformation.headUrl+"/:id/edit",
        },
        {
          name: "delete",
          icon: "heroicons-outline:trash",
          direction_name: "",
        },
      ],
      options: [
        {
          value: "1",
          label: "1",
        },
        {
          value: "3",
          label: "3",
        },
        {
          value: "5",
          label: "5",
        },
      ],
      columns: props.tableInformation.columns,
    };
  },
  setup(props) {
    const path = '/refresh';
    const query = { urlHeader: props.urlMainHeader };

    let confirmMessage = ref(false);
    let selectedItem_id = ref(0);
    const toast = useToast();
    
    function displayConfirmMessage(clickedButton, item_id){
      if(clickedButton == "delete"){
        selectedItem_id = item_id;
        confirmMessage.value = !confirmMessage.value;
      }
    }
    function hideConfirmMessage(){
        confirmMessage.value = !confirmMessage.value;
    }
    function deleteParticipant(){
        confirmMessage.value = false;
        axios.delete(`/api/${props.urlMainHeader}/${selectedItem_id}`)
        .then(response => {
          router.push({ path, query });
          toast.success("¡Registro borrado correctamente!", { timeout: 1000 });
        })
        .catch(error => {
          console.error('Error fetching data:', error);
          toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
        });
    }

    function refreshToast(){
        toast.warning("Refrescando la tabla de "+query.urlHeader+".", { timeout: 1000 });
    }
    
    return {
      displayConfirmMessage,
      deleteParticipant,
      confirmMessage,
      hideConfirmMessage,
      query,
      refreshToast
    }
  }
};
</script>
<style lang="scss"></style>
