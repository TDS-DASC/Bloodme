<template>
  <Dropdown classMenuItems=" w-[180px] top-[58px] ">
    <div class="flex items-center">
      <div class="flex-1 ltr:mr-[10px] rtl:ml-[10px]">
        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full">
          <img
            :src= "profileImg"
            alt=""
            class="block w-full h-full object-cover rounded-full"
          />
        </div>
      </div>
      <div
        class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap"
      >
        <span
          class="overflow-hidden text-ellipsis whitespace-nowrap w-fit block"
          >{{ user.name }}</span
        >
        <span class="text-base inline-block ltr:ml-[10px] rtl:mr-[10px]"
          ><Icon icon="heroicons-outline:chevron-down"></Icon
        ></span>
      </div>
    </div>
    <template #menus>
      <MenuItem v-slot="{ active }" v-for="(item, i) in ProfileMenu" :key="i">
        <div
          type="button"
          :class="`${
            active
              ? 'bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-900 dark:text-slate-300'
              : 'text-slate-600 dark:text-slate-300'
          } `"
          class="inline-flex items-center space-x-2 rtl:space-x-reverse w-full px-4 py-2 first:rounded-t last:rounded-b font-normal cursor-pointer"
          @click="item.label === 'Logout' ? sendLogOutRequest() : item.link()"
        >
          <div class="flex-none text-lg">
            <Icon :icon="item.icon" />
          </div>
          <div class="flex-1 text-sm">
            {{ item.label }}
          </div>
        </div>
      </MenuItem>
    </template>
  </Dropdown>
</template>
<script>
import { MenuItem } from "@headlessui/vue";
import Dropdown from "@/components/Dropdown";
import Icon from "@/components/Icon";
import profileImg2 from "@/assets/images/all-img/UserImages/user2.png"
import profileImg1 from "@/assets/images/all-img/UserImages/user.png"
import profileImg3 from "@/assets/images/all-img/UserImages/user3.png"
import profileImg4 from "@/assets/images/all-img/UserImages/user4.png"
import profileImg5 from "@/assets/images/all-img/UserImages/user5.png"
import profileImg6 from "@/assets/images/all-img/UserImages/user6.png"
import profileImg7 from "@/assets/images/all-img/UserImages/user7.png"
import profileImg8 from "@/assets/images/all-img/UserImages/user8.png"
import profileImg9 from "@/assets/images/all-img/UserImages/user9.png"
import axios from "@/plugins/axios";
import { useToast } from "vue-toastification";
export default {
  components: {
    Icon,
    Dropdown,
    MenuItem,
  },
  data() {
    return {
      ProfileMenu: [
        {
          label: "Profile",
          icon: "heroicons-outline:user",
          link: () => {
            this.$router.push("/profile");
          },
        },
        {
          label: "Faq",
          icon: "heroicons-outline:information-circle",
          link: () => {
            this.$router.push("faq");
          },
        },
        {
          label: "Logout",
          icon: "heroicons-outline:login",
          link: () => {
            this.$router.push("/login");
            localStorage.removeItem("activeUser");
          },
        },
      ],
    };
  },
  setup() {
    const toast = useToast();
    function deleteCookie(name) {
      document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }
    function closeSession(){
      localStorage.removeItem('user');
      deleteCookie('XSRF-TOKEN');
      deleteCookie('laravel_session');
      window.location.href = '/home';
    }
    function sendLogOutRequest(){
      axios.post(`/logout`)
          .then(res => {
            toast.info("¡A cerrado su sesión!", { timeout: 1000 });
            setTimeout(closeSession, 1000);
          })
          .catch(error => {
            console.error('Error in login request:', error);
          });
    }
    const imageMapping = {
      'user.png': profileImg1,
      'user2.png': profileImg2,
      'user3.png': profileImg3,
      'user4.png': profileImg4,
      'user5.png': profileImg5,
      'user6.png': profileImg6,
      'user7.png': profileImg7,
      'user8.png': profileImg8,
      'user9.png': profileImg9
    };

    const user = JSON.parse(localStorage.getItem('user'));

    // Get the image URL from the user object and find the corresponding imported image
    const profileImageKey = user && user.image_url ? user.image_url : 'user2.png'; // Default to user2.png if image_url is empty or null
    const profileImg = imageMapping[profileImageKey];

    return {
      user,
      profileImg,
      sendLogOutRequest,
    }
  }
};
</script>
<style lang=""></style>
