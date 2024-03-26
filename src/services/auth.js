import axios from '@/plugins/axios';

export async function isAuthenticated() {
  try {
    const response = await axios.get('/api/user'); // En espera de un mejor endpoint
    console.log(response);
    return true;
  } catch (error) {
    if (error.response && error.response.status === 401) {
      return false;
    } else {
      throw error;
    }
  }
}
