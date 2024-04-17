import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreAdministrators = defineStore({
    id: 'cachedDataAdministrators',
    state: () => ({
      administratorsTable: [],
      dataLoaded: false,
    }),
    actions: {
      setAdministratorsData(data) {
        this.administratorsTable = data;
      },
      async fetchData() {
        if (!this.dataLoaded && this.administratorsTable.length == 0) {
          try {
            const response = await axios.get(`/api/administrators`);
            response.data.forEach(administrator => {
              this.administratorsTable.push(administrator);
            });
            this.dataLoaded = true;
          } catch (error) {
            console.error('Error in request api administrators', error);
            if (error.response && error.response.status === 401 || error.code == 'ERR_NETWORK' || error.code =='ERR_CONNECTION_REFUSED') {
              this.logout();
            }
          }
        }
      },
      logout() {
        localStorage.removeItem('user');
        window.location.href = '/login';
      },
      async refreshData() {
        /* console.log("refresh"); */
        try {
          this.administratorsTable = [];
          const response = await axios.get(`/api/administrators`);
          this.setAdministratorsData(response.data);
        } catch (error) {
          console.error('Error refreshing data:', error);
        }
      },
    },
  });