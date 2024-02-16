<template>
  <router-link :to="{ name: 'home' }">
    <img
      class="w-1/5"
      src="@/assets/images/icon/blooddrop.svg"
      alt=""
      v-if="!this.$store.themeSettingsStore.isDark"
    />

    <img
      class="w-1/5"
      src="@/assets/images/icon/blooddrop.svg"
      alt=""
      v-if="this.$store.themeSettingsStore.isDark"
    />
  </router-link>
</template>
<script></script>
