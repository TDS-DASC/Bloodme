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
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Nombre
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
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
                                        <Icon icon="heroicons:phone-arrow-up-right" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Apellidos
                                        </div>
                                        <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
                                            {{ beneficiaryData.lastname }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:map" />
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
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="beneficiaryData">
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
                    </div>
                </div>
            </div>
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

    export default({
        components:{
            profile,
            Card,
            Icon,
            Button
        },
        setup() {
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

            return {
                beneficiariesTable,
                id,
                beneficiaryData,
            };
        }
    })
</script>
