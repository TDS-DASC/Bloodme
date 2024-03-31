<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="w-full">
                <div class="">
                    <Card title="Información de la campaña">
                        <div class="flex gap-8">
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex-1">
                                            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                Bolsas requeridas
                                            </div>
                                            <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                                {{ campaignData.required_bags }}
                                            </a>
                                            <p v-else>...</p>
                                        </div>
                                        <div class="flex-1">
                                            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                Bolsas Recolectadas
                                            </div>
                                            <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                                {{ campaignData.recollected_bags }}
                                            </a>
                                            <p v-else>...</p>
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="bx:donate-blood" />
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex-1">
                                            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                Plaquetas requeridas
                                            </div>
                                            <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                                {{ campaignData.required_platelets }}
                                            </a>
                                            <p v-else>...</p>
                                        </div>
                                        <div class="flex-1">
                                            <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                Plaquetas Recolectadas
                                            </div>
                                            <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                                {{ campaignData.recollected_platelets }}
                                            </a>
                                            <p v-else>...</p>
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        <!-- Separacion -->
                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols:person-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Beneficiario 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                            {{ beneficiaries }}
                                        </a>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:address-marker-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Hospital Sede 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData && hospitals">
                                            {{ hospitals }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="fluent:text-description-16-regular" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Descripción
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="campaignData">
                                            {{ campaignData.description }}
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex">
                        <router-link 
                            :to="`/campaigns`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/campaigns/${ id }/edit`" class="w-1/4">
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
    import { useCachedDataStoreCampaigns } from '@/stores/campaignsStore';
    import { useCachedDataStoreBeneficiaries } from '../../stores/beneficiariesStore';
    import { useCachedDataStoreHospitals } from '../../stores/hospitalsStore';
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

            const { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();
            let hospitals = ref([]);

            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            useCachedDataStoreBeneficiaries().fetchData();
            let beneficiaries = ref([]);

            const { campaignsTable } = useCachedDataStoreCampaigns();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreCampaigns().fetchData();

            let campaignData = ref(null); 

            watch(campaignsTable, () => {
                campaignData.value = campaignsTable.find(objeto => objeto.id == id);
                if(beneficiaries.value.length == 0 || hospitals.value.length == 0){
                    if(beneficiariesTable != null && hospitalsTable != null){
                        fillBeneficiariesArray();
                        fillHospitalArray();
                    }
                }
            });

            if(campaignsTable)
                campaignData.value = campaignsTable.find(objeto => objeto.id == id);

            function fillBeneficiariesArray() {
                const matchingBeneficiary = beneficiariesTable.find(beneficiary => beneficiary.id == campaignData.value.beneficiary_id);
                if (matchingBeneficiary) {
                    beneficiaries.value = matchingBeneficiary.name;
                } else {
                    beneficiaries.value = ("No matching hospital found");
                }
            }
            function fillHospitalArray() {
                const matchingHospital = hospitalsTable.find(hospital => hospital.id == campaignData.value.hospital_id);
                if (matchingHospital) {
                    hospitals.value = matchingHospital.name;
                } else {
                    hospitals.value = ("No matching hospital found");
                }
            }

            return {
                hospitals,
                beneficiaries,
                campaignsTable,
                id,
                campaignData,
            };
        }
    })
</script>
