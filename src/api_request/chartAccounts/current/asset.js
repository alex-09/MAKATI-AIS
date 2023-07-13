import axios from 'axios';
import Swal from 'sweetalert2';

export default function showAssetAPI() {
    const getAccount = async function() {
        try {
            const response = await axios.get("coa/showAssets")
            this.accounts = response.data.list;
            this.currentDate = response.data.date[0]['date_effectivity'];
            this.coa_title = response.data.list[0]['coa_title'];
        } catch (error) {
            console.error(error);
        }
    }

    const addAccount = async function () {
        try {
        // API REQUEST TO CHECK IF THE ACCOUNT CODE IS EXISTING
        const response = await axios.get('coa/showAssets');
        const existingAccounts = response.data.list;
        const currentYear = response.data.date;
        const accountCodeExists = existingAccounts.some(
            (account) => account.account_code === account_code.value
        );
    
        if (accountCodeExists) {
            await Swal.fire({
            text: 'The account code already exists.',
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M43.45 43.45H35.55V19.75H43.45M43.45 59.25H35.55V51.35H43.45M39.5 0C34.3128 0 29.1764 1.0217 24.384 3.00676C19.5916 4.99182 15.2372 7.90137 11.5693 11.5693C4.16159 18.977 0 29.0239 0 39.5C0 49.9761 4.16159 60.023 11.5693 67.4307C15.2372 71.0986 19.5916 74.0082 24.384 75.9932C29.1764 77.9783 34.3128 79 39.5 79C49.9761 79 60.023 74.8384 67.4307 67.4307C74.8384 60.023 79 49.9761 79 39.5C79 34.3128 77.9783 29.1764 75.9932 24.384C74.0082 19.5916 71.0986 15.2372 67.4307 11.5693C63.7628 7.90137 59.4084 4.99182 54.616 3.00676C49.8236 1.0217 44.6872 0 39.5 0Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">The account code already exists.</span></div></div>',
            confirmButtonText: 'OK',
            customClass: {
                container: 'flex flex-col-reverse sm:flex-row',
                confirmButton:
                'ml-auto mx-2 mb-2 sm:mb-0 sm:ml-2 text-white font-bold py-2 px-4 rounded uppercase bg-primary-color',
                cancelButton:
                'mb-2 mx-2 sm:mb-0 text-white font-bold py-2 px-4 rounded uppercase bg-danger-color',
            },
            buttonsStyling: false,
            });
            return;
        }
    
        const newAccount = {
            account_group: account_group.value,
            major_account_group: major_account_group.value,
            sub_major_account_group: sub_major_account_group.value,
            general_ledger_accounts: general_ledger_accounts.value,
            sub_ledger_accounts: sub_ledger_accounts.value,
            sub_sub_ledger_accounts: sub_sub_ledger_accounts.value,
            account_title: account_title.value,
            account_code: account_code.value,
            description: description.value,
            date_effectivity: response.data.date[0]['date_effectivity'],
            coa_title: response.data.list[0]['coa_title'],
        };
        // API REQUEST FOR CREATE OF ACCOUNT
        const createResponse = await axios.post('coa/enrollAssets', newAccount);
        console.log(createResponse.data);
    
        await Swal.fire({
            text:
            'Your entry has been successfully added. The account has been subject to Approval.',
            html: '<div class="flex flex-col justify-center"><div class="flex justify-center"><svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.5 0C17.775 0 0 17.775 0 39.5C0 61.225 17.775 79 39.5 79C61.225 79 79 61.225 79 39.5C79 17.775 61.225 0 39.5 0ZM31.6 59.25L11.85 39.5L17.4195 33.9305L31.6 48.0715L61.5805 18.091L67.15 23.7L31.6 59.25Z" fill="#0E4572"/></svg></div><div class="my-4"><span class="text-base text-other-gray-100">Your entry has been successfully added. The account has been subject to Approval.</span></div></div>',
            showConfirmButton: false,
            timer: 1500,
        });
    
        // window.location.reload();
        } catch (error) {
        console.error(error);
        }
    };

    return {
        addAccount,
        getAccount,
    }
}
