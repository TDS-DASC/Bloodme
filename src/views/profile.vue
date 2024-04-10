<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
                <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>    
                    <div class="profile-box flex-none md:text-start text-center">
                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse"  v-if="userRole == 'participant'">
                            <div class="flex-none">
                                <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4 ring-slate-100 relative">
                                    <img :src="userData.image_url" alt="" class="w-full h-full object-cover rounded-full" v-if="userData" />
                                    <img src="@/assets/images/avatar/av-1.svg" alt="" class="w-full h-full object-cover rounded-full" v-else />
                                        <router-link
                                            :to="`/participants/${id}/edit`"
                                            class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center justify-center md:top-[140px] top-[100px]"
                                            ><Icon icon="heroicons:pencil-square" />
                                        </router-link>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-if="userData">
                                    {{ userData.name }} {{ userData.lastname }}
                                </div>
                                <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-else>
                                    Cargando...
                                </div>
                                <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                    Nombre completo
                                </div>
                            </div>
                        </div>
                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse h-[140px]"  v-else>
                            <div class="flex-none">
                            </div>
                            <div class="flex-1">
                                <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-if="userData">
                                    {{ userData.name }} {{ userData.lastname }}
                                </div>
                                <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-else>
                                    Cargando...
                                </div>
                                <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                    Nombre completo
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile box -->
                <div    class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                    <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                            <!-- To put subtitles -->
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                            <!-- To put subtitles -->
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                            <!-- To put subtitles -->
                        </div>
                        <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                        </div>
                    </div>
                </div>

                <!-- profile info-500 -->
            </div>
            <div class="w-full">
                <div class="">
                    <Card title="Info">
                        <div class="flex gap-8">
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="wpf:name" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Nombre
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.name }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:phone-arrow-up-right" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            CELULAR
                                        </div>
                                        <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                        {{ userData.phone_number}}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="cil:birthday-cake" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Fecha de nacimiento
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.birth_date }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        <!-- Separacion -->


                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:dot" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Apellidos
                                        </div>
                                        <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.lastname }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Tipo de sangre 
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.blood_type }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols:comedy-mask-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Alias
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.alias }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                            

                        <!-- Separacion -->


                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">

                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:envelope" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            EMAIL
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.email }}
                                        </a>
                                        <p v-else>...</p>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="healthicons:sexual-reproductive-health" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Sexo
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.sex }}
                                        </div>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'participant'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols-light:id-card-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            curp
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.curp }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex" v-if="userRole == 'agent'">
                        <router-link 
                            :to="`/agents`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/agents/${ userId }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                        <Button type="button" text="Crear" btnClass="btn-danger" class="w-1/4" @click="displayConfirmMessage()">Eliminar</Button>
                    </div>
                    <div class="gap-3 w-1/2 flex" v-if="userRole == 'admin'">
                        <router-link 
                            :to="`/administrators`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/administrators/${ userId }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                        <Button type="button" text="Crear" btnClass="btn-danger" class="w-1/4" @click="displayConfirmMessage()">Eliminar</Button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3 z-10" v-if="confirmMessageFlag">
          <Card title="Se requiere confirmación" class="text-center" noborder>
              Estas a punto de eliminar tu cuenta de la base de datos, signfica que no podrás volver a acceder al sistema.<br><br>
              ¿Estás seguro que quieres continuar?
              <div class="mt-9 flex justify-evenly">
                  <Button btnClass="btn-primary" text="Confirmar" @click="deleteElement()" />
                  <Button btnClass="btn-dark" text="Cancelar" @click="displayConfirmMessage()" />
              </div>
          </Card>
      </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import profile from "@/components/profile"
    import Card from "@/components/Card";
    import Icon from "@/components/Icon";
    import { useCachedDataStoreParticipants } from '@/stores/participantsStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';
    import { useToast } from "vue-toastification";
    import axios from "@/plugins/axios";

    export default({
        components:{
            profile,
            Card,
            Icon,
            Button
        },
        setup() {
            let confirmMessageFlag = ref(false);
            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){

            }
            function deleteElement(){

            }

            const userData = JSON.parse(localStorage.getItem('user'));
            const userRole = JSON.parse(localStorage.getItem('user')).role;
            const userId = JSON.parse(localStorage.getItem('user')).id;

            return {
                userId,
                userRole,
                confirmMessageFlag,
                deleteElement,
                displayConfirmMessage,
                userData
            };
        }
    })
</script>
