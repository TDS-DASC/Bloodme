import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreUsers = defineStore({
  id: 'cachedDataUsers',
  state: () => ({
    usersTable: [],
    dataLoaded: false,
  }),
  actions: {
    setUsersData(data) {
      this.usersTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded && this.usersTable.length == 0) {
        try {
          const response = await axios.get(`/api/users`);
          response.data.forEach(beneficiary => {
            this.usersTable.push(beneficiary);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api users', error);
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
      try {
        this.usersTable = [];
        const response = await axios.get(`/api/users`);
        this.setUsersData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});