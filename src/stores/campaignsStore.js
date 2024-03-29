import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreCampaigns = defineStore({
  id: 'cachedDataCampaigns',
  state: () => ({
    campaignsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setCampaignsData(data) {
      this.campaignsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded && this.campaignsTable.length == 0) {
        try {
          const response = await axios.get(`/api/campaigns`);
          response.data.forEach(campaign => {
            this.campaignsTable.push(campaign);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api Campaigns', error);
          if (error.response && error.response.status === 401) {
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
        this.campaignsTable = [];
        const response = await axios.get(`/api/campaigns`);
        this.setCampaignsData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});