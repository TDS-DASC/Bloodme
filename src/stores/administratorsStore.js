import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useAdministratorsStore = defineStore({
    id: 'administratorsData',
    state: () => ({
      administratorsTable: [],
      dataLoaded: false,
    }),
    actions: {
      setAdministratorsData(data) {
        this.administratorsTable = data;
      },
      async fetchData() {
        if (!this.dataLoaded) {
          try {
            const response = await axios.get(`/api/administrators`);
            this.setAdministratorsData(response.data);
            this.dataLoaded = true;
          } catch (error) {
            console.error('Error in request api administrators', error);
          }
        }
      },
      pushElementToAdministrators(element) {
        this.administratorsTable.push(element);
      },
    },
  });