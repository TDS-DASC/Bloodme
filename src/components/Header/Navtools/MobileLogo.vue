<template>
  <router-link :to="{ name: 'home' }">
    <img
      class="w-8"
      src="@/assets/images/icon/blooddrop.svg"
      alt=""
      v-if="!this.$store.themeSettingsStore.isDark"
    />

    <img
      src="@/assets/images/icon/blooddrop.svg"
      class="w-8"
      alt=""
      v-if="this.$store.themeSettingsStore.isDark"
    />
  </router-link>
</template>
<script></script>
