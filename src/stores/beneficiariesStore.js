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
      if (!this.dataLoaded) {
        try {
          const response = await axios.get(`/api/beneficiaries`);
          response.data.forEach(beneficiary => {
            // Add each beneficiary directly to the beneficiariesTable array
            this.beneficiariesTable.push(beneficiary);
          });
          this.dataLoaded = true;
          console.log(response);
        } catch (error) {
          console.error('Error in request api beneficiaries', error);
        }
      }
    },
    pushElementToBeneficiaries(element) {
      this.beneficiariesTable.push(element);
    },
  },
});