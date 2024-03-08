import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreHospitals = defineStore({
  id: 'cachedDataHospitals',
  state: () => ({
    hospitalsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setHospitalsData(data) {
      this.hospitalsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded) {
        try {
          const response = await axios.get(`/api/hospitals`);
          response.data.forEach(hospital => {
            this.hospitalsTable.push(hospital);
          });
          this.dataLoaded = true;
          console.log(response);
        } catch (error) {
          console.error('Error in request api hospitals', error);
        }
      }
    },
    pushElementToHospitals(element) {
      this.hospitalsTable.push(element);
    },
  },
});
