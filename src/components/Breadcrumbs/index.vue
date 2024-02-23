<template>
  <div class="mb-4 flex space-x-3 rtl:space-x-reverse">
    <ul class="breadcrumbs">
      <li class="text-primary-500">
        <router-link :to="{ name: 'home' }" class="text-lg">
          <Icon icon="heroicons-outline:home" />
        </router-link>
        <span class="breadcrumbs-icon rtl:transform rtl:rotate-180">
          <Icon icon="heroicons:chevron-right" />
        </span>
      </li>
      
      <li v-for="(word, index) in $route.name.split('-')" :key="index">
        <router-link :to="`/${word.toLowerCase()}`" class="capitalize" v-if="word != 'routless'">
          {{ word }}
        </router-link>
        <router-link :to="`${this.$route.fullPath}`" class="capitalize" v-else>
          {{ $route.fullPath.replace(/\//g, '') }}
        </router-link>
        <span v-if="index < $route.name.split('-').length - 1" class="breadcrumbs-icon rtl:transform rtl:rotate-180">
          <Icon icon="heroicons:chevron-right" />
        </span>
      </li>
    </ul>
  </div>
</template>
<script>
import Icon from "@/components/Icon";
import {watch} from "vue";
  export default {
    components: {
      Icon,
    },
  };
</script>
<style lang="scss">
.breadcrumbs {
  @apply flex text-sm space-x-2 items-center;
  li {
    @apply relative flex items-center space-x-2 capitalize font-normal rtl:space-x-reverse;
    .breadcrumbs-icon {
      @apply text-lg text-secondary-500 dark:text-slate-500;
    }
  }
}
</style>
