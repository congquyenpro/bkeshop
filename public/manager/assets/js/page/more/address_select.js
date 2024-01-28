
//API get address from GHN: https://api.ghn.vn/home/docs/detail
const apiUrlProvince = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province';
const apiUrlDistrict = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district';
const apiUrlWard = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward';
const token = 'e148f621-8762-11ee-96dc-de6f804954c9';

const provinceSelect = document.getElementById("provinceSelect");
const districtSelect = document.getElementById("districtSelect");
const wardSelect = document.getElementById("wardSelect");
const addressDetail = document.getElementById("addressDetail");



// Sự kiện onchange cho select tỉnh/thành phố để tải quận/huyện tương ứng
provinceSelect.addEventListener('change', loadDistricts);

districtSelect.addEventListener('change', loadWards);

// Đối tượng chứa các tùy chọn cho yêu cầu fetch, bao gồm header
const fetchOptions = {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'token': token,
    },
};

// Sử dụng fetch để gọi API và lấy danh sách tỉnh/thành phố
fetch(apiUrlProvince, fetchOptions)
    .then(response => {
        if (!response.ok) {
            throw new Error(`Gọi API không thành công. Mã lỗi: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Xử lý dữ liệu JSON ở đây
        populateProvinceSelect(data.data);
    })
    .catch(error => {
        console.error('Đã xảy ra lỗi khi tải tỉnh/thành phố:', error);
    });

function populateProvinceSelect(provinces) {
    // Thêm các tỉnh/thành phố vào select
    provinces.forEach(province => {
        const option = document.createElement("option");
        option.value = province.ProvinceID;
        option.text = province.ProvinceName;
        provinceSelect.add(option);
    });

    // Gọi sự kiện onchange cho select tỉnh/thành phố để tải quận/huyện ban đầu
    loadDistricts();
}

function loadDistricts() {
    const selectedProvinceId = provinceSelect.value;

    // Gọi API để lấy danh sách quận/huyện cho tỉnh/thành phố đã chọn
    const districtApiUrl = `${apiUrlDistrict}?province_id=${selectedProvinceId}`;
    fetch(districtApiUrl, fetchOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Gọi API không thành công. Mã lỗi: ${response.status}`);
            }
            return response.json();
        })
        .then(data => populateDistrictSelect(data.data))
        .catch(error => console.error('Lỗi khi tải quận/huyện:', error));
}

function populateDistrictSelect(districts) {
    // Xóa các option cũ trong select quận/huyện
    while (districtSelect.options.length > 0) {
        districtSelect.remove(0);
    }

    // Thêm các quận/huyện vào select
    districts.forEach(district => {
        const option = document.createElement("option");
        option.value = district.DistrictID;
        option.text = district.DistrictName;
        districtSelect.add(option);
    });

    // Gọi sự kiện onchange cho select quận/huyện để tải phường/xã ban đầu
    loadWards();
}

function loadWards() {
    const selectedDistrictId = districtSelect.value;

    // Gọi API để lấy danh sách phường/xã cho quận/huyện đã chọn
    const wardApiUrl = `${apiUrlWard}?district_id=${selectedDistrictId}`;
    fetch(wardApiUrl, fetchOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Gọi API không thành công. Mã lỗi: ${response.status}`);
            }
            return response.json();
        })
        .then(data => populateWardSelect(data.data))
        .catch(error => console.error('Lỗi khi tải phường/xã:', error));
}

function populateWardSelect(wards) {
    // Xóa các option cũ trong select phường/xã
    while (wardSelect.options.length > 0) {
        wardSelect.remove(0);
    }

    // Thêm các phường/xã vào select
    wards.forEach(ward => {
        const option = document.createElement("option");
        option.value = ward.WardCode;
        option.text = ward.WardName;
        wardSelect.add(option);
    });
}


// Sự kiện click cho nút submit
const submitButton = document.getElementById("saveAddress");

submitButton.addEventListener('click', function () {
    const selectedProvince = provinceSelect.options[provinceSelect.selectedIndex].text;
    const selectedDistrict = districtSelect.options[districtSelect.selectedIndex].text;
    const selectedWard = wardSelect.options[wardSelect.selectedIndex].text;
    const enteredAddressDetail = addressDetail.value;

    const addressFull = `${selectedWard}, ${selectedDistrict}, ${selectedProvince}, ${enteredAddressDetail}`;
    console.log(addressFull);

    document.getElementById('addressFull').value = addressFull;
    // Gọi hàm hoặc thực hiện các tác vụ khác sau khi bấm nút submit
    // Ví dụ: submitForm();
});