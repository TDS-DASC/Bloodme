<template>
  <router-view />
</template>

<script>
import { useThemeSettingsStore } from "@/store/themeSettings";

export default {
  mounted() {
    // Set themeSettingsStore on global $store
    this.$store.themeSettingsStore = useThemeSettingsStore();
  }
}
</script>

<style></style>
