import { ref } from "vue";
import axios from 'axios'

// axios.default.baseURL = "http://127.0.0.1:8000/api/coa/";

export default function useIncomes() {

    const incomes = ref([]);
    const income = ref([]);
    const errors = ref([]);

    const getIncomes = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showIncome");
        incomes.value = response.data.data;
    }

    const getIncome = async (id) => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showIncome" + id);
        income.value = response.data.data;
    }

    const updateDesc = async (id) => {
        try {
            await axios.put("http://127.0.0.1:8000/api/coa/showIncome/" + id, income.value);
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        income,
        incomes,
        getIncomes,
        getIncome,
        updateDesc,
        errors,
    };
}

