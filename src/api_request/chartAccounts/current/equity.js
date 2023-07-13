import axios from 'axios';
import Swal from 'sweetalert2';

export default function showEquityAPI() {
    const getAccount = async function() {
        try {
            const response = await axios.get("coa/showEquity")
            this.accounts = response.data.list;
            this.currentDate = response.data.date[0]['date_effectivity'];
            this.coa_title = response.data.list[0]['coa_title'];
            console.log(this.currentDate);
            console.log(this.coa_title);
            console.log('HELLO IM IN DA WATER');
        } catch (error) {
            console.error(error);
        }
    }

    return {
        getAccount,
    }
}