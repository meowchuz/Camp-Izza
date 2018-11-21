const tmpDate = document.getElementById('tmp-date');
const tmpMonth = document.getElementById('tmp-month');
const tmpYear = document.getElementById('tmp-year');
const birthday = document.getElementById('input-birthday-hidden');

const nameForUpdate = document.getElementById('input-name__update');
const genderForUpdate = document.getElementById('input-gender__update');
const tmpDateForUpdate = document.getElementById('tmp-date__update');
const tmpMonthForUpdate = document.getElementById('tmp-month__update');
const tmpYearForUpdate = document.getElementById('tmp-year__update');
const birthdayForUpdate = document.getElementById('input-birthday-hidden__update');

const btnUpdate = document.getElementsByClassName('btn-update');
const modalForUpdate = $('#update-modal');
const formForUpdate = document.getElementById('update-form');

tmpDate.addEventListener('change', changeBirthday);
tmpMonth.addEventListener('change', changeBirthday);
tmpYear.addEventListener('change', changeBirthday);

tmpDateForUpdate.addEventListener('change', changeBirthdayForUpdate);
tmpMonthForUpdate.addEventListener('change', changeBirthdayForUpdate);
tmpYearForUpdate.addEventListener('change', changeBirthdayForUpdate);

_.forEach(btnUpdate, (button) => {
    button.addEventListener('click', updateCamper);
})

function changeBirthday() {
    const newBirthday = `${tmpMonth.value}/${tmpDate.value}/${tmpYear.value}`;
    birthday.value = newBirthday;
}

function changeBirthdayForUpdate() {
    const newBirthday = `${tmpMonthForUpdate.value}/${tmpDateForUpdate.value}/${tmpYearForUpdate.value}`;
    inputBirthdayForUpdate.value = newBirthday;
}

function updateCamper(e) {
    const camperID = e.target.dataset.camper;
    
    axios.get(`/api/campers/${camperID}`).then((res) => {
        if (200 === res.status) {
            const data = res.data;
            const birthday = data.birthday.split('/');

            nameForUpdate.value = data.name;
            genderForUpdate.value = data.gender;
            birthdayForUpdate.value = data.birthday;
            tmpDateForUpdate.value = birthday[1];
            tmpMonthForUpdate.value = birthday[0];
            tmpYearForUpdate.value = birthday[2];
            formForUpdate.action = `/campers/${data.id}`;
        } else {
            throw new Error('Has problem when get camper information');
        }
    }).catch((err) => {
        console.log(err);
    });
}
