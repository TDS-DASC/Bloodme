<template>
  <form @submit.prevent="onSubmit" class="space-y-4">
    <Textinput
      label="Password"
      type="password"
      placeholder="8+ characters, 1 capitat letter "
      name="password"
      v-model="password"
      :error="passwordError"
      hasicon
      classInput="h-[48px]"
    />

    <button type="submit" class="btn btn-dark block w-full text-center">
      Unlock
    </button>
  </form>
</template>
<script>
import Textinput from "@/components/Textinput";
import { useField, useForm } from "vee-validate";
import * as yup from "yup";

export default {
  components: {
    Textinput,
  },
  data() {
    return {
      checkbox: false,
    };
  },
  setup() {
    // Define a validation schema
    const schema = yup.object({
      password: yup.string().required().min(8),
    });

    const { handleSubmit } = useForm({
      validationSchema: schema,
    });
    // No need to define rules for fields

    const { value: password, errorMessage: passwordError } =
      useField("password");

    const onSubmit = handleSubmit(() => {
      // console.warn(values);
    });

    return {
      password,
      passwordError,
      onSubmit,
    };
  },
};
</script>
<style lang="scss"></style>
