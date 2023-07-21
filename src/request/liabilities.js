import { ref } from "vue";
import axios from 'axios'

export default function useLiabilities() {

    const liabilities = ref([]);
    const liability = ref([]);
    const errors = ref([]);

    const getLiabilities = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showLiabilities");
        liabilities.value = response.data.data;
    }

    const getLiability = async (id) => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showLiabilities" + id);
        liability.value = response.data.data;
    }

    const updateDesc = async (id) => {
        try {
            await axios.put("http://127.0.0.1:8000/api/coa/showLiabilities/" + id, liability.value);
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        liability,
        liabilities,
        getLiabilities,
        getLiability,
        updateDesc,
        errors,
    };
}