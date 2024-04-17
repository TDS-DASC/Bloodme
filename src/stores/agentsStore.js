import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreAgents = defineStore({
  id: 'cachedDataAgents',
  state: () => ({
    agentsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setAgentsData(data) {
      this.agentsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded && this.agentsTable.length == 0) {
        try {
          const response = await axios.get(`/api/agents`);
          response.data.forEach(agent => {
            this.agentsTable.push(agent);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api agents', error);
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
        this.agentsTable = [];
        const response = await axios.get(`/api/agents`);
        this.setAgentsData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});