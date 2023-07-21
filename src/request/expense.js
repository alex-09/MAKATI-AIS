import { ref } from "vue";
import axios from 'axios'

// axios.default.baseURL = "http://127.0.0.1:8000/api/coa/";

export default function useExpenses() {

    const expenses = ref([]);
    const expense = ref([]);
    const errors = ref([]);

    const getExpenses = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showExpenses");
        expenses.value = response.data.data;
    }

    const getExpense = async (id) => {
        const response = await axios.get("http://127.0.0.1:8000/api/coa/showExpenses" + id);
        expense.value = response.data.data;
    }

    const updateDesc = async (id) => {
        try {
            await axios.put("http://127.0.0.1:8000/api/coa/showExpenses/" + id, expense.value);
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        expense,
        expenses,
        getExpenses,
        getExpense,
        updateDesc,
        errors,
    };
}

