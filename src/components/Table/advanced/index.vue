<template>
  <div class="flex flex-col p-4 bg-white rounded-md dark:bg-slate-800" v-if="tableData">
      <div
        class="md:flex justify-between pb-6 md:space-y-0 space-y-3 items-center"
      >
        <h5>{{ tableInformation.title }}</h5>
        <InputGroup
          v-model="searchTerm"
          placeholder="Search"
          type="text"
          prependIcon="heroicons-outline:search"
          merged
        />
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
          selectOnCheckboxOnly: true, // only select when checkbox is clicked instead of the row
          selectioninfoClass: 'custom-class',
          selectionText: 'rows selected',
          clearSelectionText: 'clear',
          disableSelectinfo: true, // disable the select info-500 panel on top
          selectAllByGroup: true, // when used in combination with a grouped table, add a checkbox in the header row to check/uncheck the entire group
        }"
      >
        <template v-slot:table-row="props">
          <span v-if="props.column.field == 'action'">
            <Dropdown classMenuItems=" w-[140px]">
              <span class="text-xl"><Icon icon="heroicons-outline:dots-vertical"/></span>
              <template v-slot:menus>
                <MenuItem v-for="(item, i) in actions" :key="i">
                  <template v-if="item.name !== 'delete'">
                    <router-link :to="item.name === 'view' ? `/${tableInformation.headUrl}/${props.row.id}` : (item.name === 'edit' ? `/${tableInformation.headUrl}/${props.row.id}/edit` : '')">
                      <div :class="`${
                        item.name === 'delete'
                          ? 'bg-danger-500 text-danger-500 bg-opacity-30 hover:bg-opacity-100 hover:text-white'
                          : 'hover:bg-slate-900 hover:text-white dark:hover:bg-slate-600 dark:hover:bg-opacity-50' 
                        }
                        w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm  last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex  space-x-2 items-center rtl:space-x-reverse `"
                      >
                        <span class="text-base"><Icon :icon="item.icon"/></span>
                        <span>{{ item.name }}</span>
                      </div>
                    </router-link>
                  </template>
                  <template v-else>
                    <button @click="handleDelete(props.row.id)" class="bg-danger-500 text-danger-500 bg-opacity-30 hover:bg-opacity-100 hover:text-white w-full border-b border-b-gray-500 border-opacity-10 px-4 py-2 text-sm  last:mb-0 cursor-pointer first:rounded-t last:rounded-b flex  space-x-2 items-center rtl:space-x-reverse">
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
  </div>
</template>
<script>
import Dropdown from "@/components/Dropdown";
import Icon from "@/components/Icon";
import InputGroup from "@/components/InputGroup";
import Pagination from "@/components/Pagination";
import { MenuItem } from "@headlessui/vue";
import { advancedTable } from "../../../constant/basic-tablle-data";
import axios from "@/plugins/axios"
import { ref } from "vue" 
export default {
  components: {
    Pagination,
    InputGroup,
    Dropdown,
    Icon,
    MenuItem,
  },
  props: {
    tableInformation: Object,
    tableData: Object,
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
          direction_name: "1",
        },
        {
          name: "delete",
          icon: "heroicons-outline:trash",
          direction_name: props.tableInformation.headUrl+"/:id/edit",
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
    console.log(props.tableData)
    return {
    }
  }
};
</script>
<style lang="scss"></style>
