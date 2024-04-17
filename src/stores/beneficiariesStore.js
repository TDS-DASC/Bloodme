import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreBeneficiaries = defineStore({
  id: 'cachedDataBeneficiaries',
  state: () => ({
    beneficiariesTable: [],
    dataLoaded: false,
  }),
  actions: {
    setBeneficiariesData(data) {
      this.beneficiariesTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded && this.beneficiariesTable.length == 0) {
        try {
          const response = await axios.get(`/api/beneficiaries`);
          response.data.forEach(beneficiary => {
            this.beneficiariesTable.push(beneficiary);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api beneficiaries', error);
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
        this.beneficiariesTable = [];
        const response = await axios.get(`/api/beneficiaries`);
        this.setBeneficiariesData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});