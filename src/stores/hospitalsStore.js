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
      if (!this.dataLoaded && this.hospitalsTable.length == 0) {
        console.log("fetch");
        try {
          const response = await axios.get(`/api/hospitals`);
          response.data.forEach(hospital => {
            this.hospitalsTable.push(hospital);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api hospitals', error);
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
      console.log("refresh");
      try {
        this.hospitalsTable = [];
        const response = await axios.get(`/api/hospitals`);
        this.setHospitalsData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});
