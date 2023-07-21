import { ref } from "vue";
import axios from 'axios';
import { useRouter } from 'vue-router'

// axios.default.baseURL = "http://127.0.0.1:8000/api/coa/";

export default function useAssets() {

    const assets = ref([]);
    const asset = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getAssets = async () => {
        const response = await axios.get("http://makati-ais-api.com/api/coa/showAssets");
        assets.value = response.data.data;
    }

    const getAsset = async (id) => {
        const response = await axios.get("http://makati-ais-api.com/api/coa/showAssets" + id);
        asset.value = response.data.data;
    }

    const editDescription = async () => {
        try {
            await axios.post("http://makati-ais-api.com/api/coa/showAssets/addAssetDescription/" + id)
            await router.push({name: 'ChartsAssets'});
            window.location.reload();
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const enrollAssets = async (data) => {
        try {
            await axios.post("http://makati-ais-api.com/api/coa/enrollAssets", data);
            await router.push({name: 'ChartsAssets'});
            window.location.reload();
        }catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }
    
    const updateStatus = async (id) => {
        try {
            await axios.put("http://makati-ais-api.com/api/coa/showAssets/" + id);
            await router.push({name: 'ChartsAssets'});
            window.location.reload();
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        asset,
        assets,
        getAssets,
        getAsset,
        updateStatus,
        enrollAssets,
        editDescription,
        errors,
        router
    };
}

