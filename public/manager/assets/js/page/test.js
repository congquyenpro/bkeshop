

var data = []
Api.Category.GetAll()
    .done(res => {
        // Sử dụng đối tượng JSON trực tiếp tại đây, không cần sử dụng JSON.parse()
        data = res;
        /*     var categoryName = data.data[0].name; */

        console.log(data.data);
    })
    .fail(err => {
        IndexView.helper.showToastError('Error', 'Có lỗi sảy ra');
    })
    .always(() => { });





/* 
const text = '{"name":"John", "birth":"1986-12-14", "city":"New York"}';
const obj = JSON.parse(text, function (key, value) {
  if (key == "birth") {
    return new Date(value);
  } else {
    return value;
  }
});

$("#category").append(obj.name); */
