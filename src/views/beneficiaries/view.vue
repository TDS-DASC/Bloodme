<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="w-full">
                <div class="">
                    <Card title="Información del Beneficiario">
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
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.name }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="cil:birthday-cake" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Fecha de nacimiento
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.birth_date }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <!-- Separacion -->


                            <ul class="list space-y-8 w-full">
                                
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:dot" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Apellidos
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.lastname }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols-light:id-card-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Curp
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.curp }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                            

                        <!-- Separacion -->


                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Tipo de sangre 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.blood_type }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex">
                        <router-link 
                            :to="`/beneficiaries`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/beneficiaries/${ id }/edit`" class="w-1/4">
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
    import { useCachedDataStoreBeneficiaries } from '@/stores/beneficiariesStore';
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
            let confirmMessageFlag = ref(false);
            const router = useRouter();
            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreBeneficiaries().fetchData();

            let beneficiaryData = ref(null); 

            watch(beneficiariesTable, () => {
                console.log(beneficiariesTable);
                beneficiaryData.value = beneficiariesTable.find(objeto => objeto.id == id);
            });

            if(beneficiariesTable)
                beneficiaryData.value = beneficiariesTable.find(objeto => objeto.id == id);


            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'beneficiaries' } });
            }
            function deleteElement(){
                confirmMessageFlag.value = false;
                axios.delete(`/api/beneficiaries/${ id }`)
                .then(response => {
                    useCachedDataStoreBeneficiaries().refreshData();
                    toast.success("¡Beneficiario eliminado correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                });
            }

            return {
                deleteElement,
                beneficiariesTable,
                id,
                beneficiaryData,
                displayConfirmMessage,
                confirmMessageFlag
            };
        }
    }
</script>
