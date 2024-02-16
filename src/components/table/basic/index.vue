<template>
  <div class="grid xl:grid-cols-2 grid-cols-1 gap-5">
    <Card bodyClass="p-0">
      <header class="px-4 pt-4 pb-3 mb-3">
        <h5 class="card-title mb-0">Basic Table</h5>
      </header>
      <vue-good-table
        :columns="columns"
        :rows="newtable"
        styleClass=" vgt-table"
        :sort-options="{
          enabled: false,
        }"
      />
    </Card>
    <Card bodyClass="p-0">
      <header class="px-4 pt-4 pb-3 mb-3">
        <h5 class="card-title mb-0">Table Head</h5>
      </header>
      <vue-good-table
        :columns="columns"
        :rows="newtable"
        styleClass="vgt-table table-head"
        :sort-options="{
          enabled: false,
        }"
      />
    </Card>
    <Card bodyClass="p-0">
      <header class="px-4 pt-4 pb-3 mb-3">
        <h5 class="card-title mb-0">Bordered Table</h5>
      </header>
      <vue-good-table
        :columns="columns"
        :rows="newtable"
        styleClass="vgt-table bordered"
        :sort-options="{
          enabled: false,
        }"
      />
    </Card>
    <Card title="Borderless table">
      <div class="-mx-6">
        <vue-good-table
          :columns="columns"
          :rows="newtable"
          styleClass="vgt-table  borderless"
          :sort-options="{
            enabled: false,
          }"
        />
      </div>
    </Card>
    <Card bodyClass="p-0">
      <header class="px-4 pt-4 pb-3 mb-3">
        <h5 class="card-title mb-0">Striped Rows</h5>
      </header>
      <vue-good-table
        :columns="columns"
        :rows="newtable"
        styleClass="vgt-table striped"
        :sort-options="{
          enabled: false,
        }"
      />
    </Card>
  </div>
</template>
<script>
import Card from '@/components/Card';
import { basiTableData } from '../../../constant/basic-tablle-data';
export default {
  components: {
    Card,
  },
  data() {
    return {
      basiTableData,
      columns: [
        {
          label: 'Age',
          field: 'age',
        },
        {
          label: 'First Name',
          field: 'first_name',
        },

        {
          label: 'Email',
          field: 'email',
        },
      ],
    };
  },
  computed: {
    newtable: function () {
      return this.basiTableData.filter(function (item) {
        return Boolean(item.id < 8);
      });
    },
  },
};
</script>
<style lang="scss">
.vgt-inner-wrap {
  @apply shadow-none;
}
</style>
