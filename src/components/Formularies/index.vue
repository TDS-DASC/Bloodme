<template>
  <h3>{{ formInformation.title }}</h3><br>
  <div class="w-full border-slate-200 border-b-2"></div>
  <br>
  <form
    @submit.prevent="onSubmit"
    class="lg:grid-cols-2 grid gap-5 grid-cols-1"
  >
    <Textinput
      label="Required"
      type="text"
      placeholder="Type your User Name"
      name="re_userName"
      v-model="username"
      :error="usernameError"
    />
    <Textinput
      label="Must only consist of numbers"
      type="text"
      placeholder="Enter Number Only"
      name="re_number"
      v-model="number"
      :error="numberError"
    />
    <Textinput
      label="Range Value"
      type="text"
      placeholder="Enter Number between 1 & 10"
      name="re_number2"
      v-model="betweenNumber"
      :error="betweenNumberError"
    />

    <Textinput
      label="alphabetic characters"
      type="text"
      placeholder="Enter Character Only"
      name="re_special"
      v-model="alphabetic"
      :error="alphabeticError"
    />

    <Textinput
      label="Length should not be less than the specified length : 3"
      type="text"
      placeholder="Enter minimum 3 Characters"
      name="re_length"
      v-model="length"
      :error="lengthError"
    />
    <Textinput
      label="Password"
      type="password"
      placeholder="8+ characters, 1 capitat letter "
      name="re_password"
      v-model="password"
      :error="passwordError"
    />
    <Textinput
      label="Must be a valid url"
      type="url"
      placeholder="Enter Valid URL"
      name="re_url"
      v-model="url"
      :error="urlError"
    />
    <Textarea
      label="Message"
      placeholder="Writte Your Message"
      name="re_msg"
      v-model="message"
      :error="messageError"
    />

    <div class="lg:col-span-2">
      <Button text="Submit" btnClass="btn-dark"></Button>
    </div>
  </form>
</template>
<script>
  import Button from "@/components/Button";
  import Textarea from "@/components/Textarea";
  import Textinput from "@/components/Textinput";
  import { useField, useForm } from "vee-validate";
  import * as yup from "yup";

  export default {
    components: {
      Textinput,
      Button,
      Textarea,
    },
    props: {
      formInformation: Object,
    },
    setup() {
      // Define a validation schema
      const schema = yup.object({
        username: yup.string().required(),
        number: yup.number().required().positive(),
        betweenNumber: yup
          .number()
          .required("The Number between field is required")
          .positive()
          .min(1)
          .max(10),

        alphabetic: yup
          .string()
          .required()
          .matches(/^[a-zA-Z]+$/, "Must only consist of alphabetic characters"),
        length: yup
          .string()
          .required("The Min Character field is required")
          .min(3),

        password: yup.string().required().min(8),
        url: yup.string().required("The URL field is required").url(),
        message: yup.string().required("The Message field is required"),
      });

      const { handleSubmit } = useForm({
        validationSchema: schema,
      });
      // No need to define rules for fields

      const { value: username, errorMessage: usernameError } =
        useField("username");
      const { value: number, errorMessage: numberError } = useField("number");
      const { value: betweenNumber, errorMessage: betweenNumberError } =
        useField("betweenNumber");
      const { value: alphabetic, errorMessage: alphabeticError } =
        useField("alphabetic");

      const { value: length, errorMessage: lengthError } = useField("length");
      const { value: password, errorMessage: passwordError } =
        useField("password");
      const { value: url, errorMessage: urlError } = useField("url");
      const { value: message, errorMessage: messageError } = useField("message");

      const onSubmit = handleSubmit(() => {
        // console.warn(values.email);
      });

      return {
        message,
        messageError,
        url,
        urlError,
        password,
        passwordError,
        length,
        lengthError,
        number,
        alphabetic,
        alphabeticError,
        betweenNumber,
        betweenNumberError,
        numberError,
        username,
        usernameError,
        onSubmit,
      };
    },
  };
</script>
<style lang="scss"></style>
