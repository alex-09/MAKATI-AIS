import { ref } from "vue";
import axios from 'axios'

// axios.default.baseURL = "http://127.0.0.1:8000/api/coa/";

export default function useEquities() {

    const equities = ref([]);
    const equity = ref([]);
    const errors = ref([]);

    const getEquities = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showEquity");
        equities.value = response.data.data;
    }

    const getEquity = async (id) => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showEquity" + id);
        equity.value = response.data.data;
    }

    const updateDesc = async (id) => {
        try {
            await axios.put("http://127.0.0.1:8000/api/coa/showEquity/" + id, equity.value);
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        equity,
        equities,
        getEquities,
        getEquity,
        updateDesc,
        errors,
    };
}

