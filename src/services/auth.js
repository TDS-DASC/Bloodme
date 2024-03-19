import axios from '@/plugins/axios';

export async function isAuthenticated() {
  try {
    const response = await axios.get('/api/hospitals'); // En espera de un mejor endpoint
    return true;
  } catch (error) {
    if (error.response && error.response.status === 401) {
      return false;
    } else {
      throw error;
    }
  }
}
