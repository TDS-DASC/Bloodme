<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
                <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>    
                    <div class="profile-box flex-none md:text-start text-center">
                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse  h-[140px]">
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
                    <!-- <div    class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                33
                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Donaciones totales
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                2
                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Campañas creadas
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                9 
                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Citas agendadas
                            </div>
                        </div>
                    </div> -->
            </div>
            <div class="w-full">
                <div class="">
                    <Card title="Info">
                        <div class="flex gap-8">
                        <!-- Separacion -->
                            <ul class="w-full flex items-center align-middle gap-20">
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
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex">
                        <router-link 
                            :to="`/administrators`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/administrators/${ id }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                        <Button type="button" text="Crear" btnClass="btn-danger" class="w-1/4" @click="displayConfirmMessage()">Eliminar</Button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
          <Card title="Se requiere confirmación" class="text-center" noborder>
            <span class="dark:text-white">
                    Estas a punto de eliminar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
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
    import { useCachedDataStoreAdministrators } from '@/stores/administratorsStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';
    import { useToast } from "vue-toastification";
    import axios from "@/plugins/axios";

    export default{
        components:{
            profile,
            Card,
            Icon,
            Button
        },
        setup() {
            const router = useRouter();
            const { administratorsTable } = useCachedDataStoreAdministrators();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreAdministrators().fetchData();

            let userData = ref(null); 

            watch(administratorsTable, () => {
                console.log(administratorsTable);
                userData.value = administratorsTable.find(objeto => objeto.id == id);
            });

            if(administratorsTable)
                userData.value = administratorsTable.find(objeto => objeto.id == id);

            let confirmMessageFlag = ref(false);
            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'administrators' } });
            }
            function deleteElement(){
                confirmMessageFlag.value = false;
                axios.delete(`/api/administrators/${ id }`)
                .then(response => {
                    useCachedDataStoreAdministrators().refreshData();
                    toast.success("¡Administrador eliminado correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                });
            }

            return {
                confirmMessageFlag,
                deleteElement,
                displayConfirmMessage,
                administratorsTable,
                id,
                userData,
            };
        }
    }
</script>
