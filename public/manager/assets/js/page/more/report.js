const ViewReport ={
    Financial: {
        set(){
            $(document).ready(function(){

                //Dafault
                Api.Report.getFinancial({
                    start_time: '2024-01-01',
                    end_time: '2024-02-01'
                    }).done(function(response) {
                        // Xử lý kết quả từ API nếu cần
                        console.log("API Response:", response);

                        var before = response.before_period_profit
                        var now = response.perid_profit

                        $('#pre_1').html(before.monel_real);
                        $('#now_1').html(now.monel_real);
                        if(before.monel_real > now.monel_real){
                            $("#rate1").html('-'+ (before.monel_real - now.monel_real));
                        }else{
                            $("#rate1").html('+'+ (now.monel_real - before.monel_real));
                        }

                        $('#pre_2').html(before.monel_real);
                        $('#now_2').html(now.monel_real);
                        if(before.monel_real > now.monel_real){
                            $("#rate2").html('-'+ (before.monel_real - now.monel_real));
                        }
                        else{
                            $("#rate2").html('+'+ (now.monel_real - before.monel_real));
                        }

                        $('#pre_3').html(before.money_sold);
                        $('#now_3').html(now.money_sold);
                        if(before.money_sold > now.money_sold){
                            $("#rate3").html('-'+ (before.money_sold - now.money_sold));
                        }
                        else{
                            $("#rate3").html('+'+ (now.money_sold - before.money_sold));
                        }

                        $('#pre_4').html(before.money_return);
                        $('#now_4').html(now.money_return);
                        if(before.money_return > now.money_return){
                            $("#rate4").html('-'+ (before.money_return - now.money_return));
                        }
                        else{
                            $("#rate4").html('+'+ (now.money_return - before.money_return));
                        }

                        $('#pre_5').html(before.fee_sale);
                        $('#now_5').html(now.fee_sale);
                        if(before.fee_sale > now.fee_sale){
                            $("#rate5").html('-'+ (before.fee_sale - now.fee_sale));
                        }
                        else{
                            $("#rate5").html('+'+ (now.fee_sale - before.fee_sale));
                        }

                        $('#pre_6').html(before.actual_cost);
                        $('#now_6').html(now.actual_cost);
                        if(before.actual_cost > now.actual_cost){
                            $("#rate6").html('-'+ (before.actual_cost - now.actual_cost));
                        }
                        else{
                            $("#rate6").html('+'+ (now.actual_cost - before.actual_cost));
                        }

                        $('#pre_7').html(before.fee_ship);
                        $('#now_7').html(now.fee_ship);
                        if(before.fee_ship > now.fee_ship){
                            $("#rate7").html('-'+ (before.fee_ship - now.fee_ship));
                        }
                        else{
                            $("#rate7").html('+'+ (now.fee_ship - before.fee_ship));
                        }

                        $('#pre_9').html(before.profit);
                        $('#now_9').html(now.profit);
                        if (before.profit > 0) {
                            if(before.profit > now.profit){
                                $("#rate_9").html('-'+ (before.profit - now.profit));
                            }
                            else{
                                $("#rate_9").html('+'+ (now.profit - before.profit));
                            }
    
                        }else{
                            if(before.profit > now.profit){
                                $("#rate_9").html('+'+ (before.profit - now.profit));
                            }
                            else{
                                $("#rate_9").html('-'+ (now.profit - before.profit));
                            }
                        }
                        

                        

                    }).fail(function(error) {
                        // Xử lý lỗi nếu cần
                        console.error("API Error:", error);
                    }).always(function() {
                        // Xử lý dù API có thành công hay thất bại
                        console.log("API Call Done!");
                    });


                $('#filter_financial').on('click', function(){

                    function formatDate(inputDateString) {
                        var dateArray = inputDateString.split('/');
                        return dateArray[2] + '-' + dateArray[0] + '-' + dateArray[1];
                    }

                    // Lấy giá trị ngày từ ô input có name="start"
                    var startDate = formatDate($("input[name='start']").val());

                    // Lấy giá trị ngày từ ô input có name="end"
                    var endDate = formatDate($("input[name='end']").val());

                    // In ra console để kiểm tra
                    console.log("Start Date:", startDate);
                    console.log("End Date:", endDate);
                            // Gửi dữ liệu lên API
                    Api.Report.getFinancial({
                        start_time: startDate,
                        end_time: endDate
                        }).done(function(response) {
                            // Xử lý kết quả từ API nếu cần
                            console.log("API Response:", response);

                            var before = response.before_period_profit
                            var now = response.perid_profit
    
                            $('#pre_1').html(before.monel_real);
                            $('#now_1').html(now.monel_real);
                            if(before.monel_real > now.monel_real){
                                $("#rate1").html('-'+ (before.monel_real - now.monel_real));
                            }else{
                                $("#rate1").html('+'+ (now.monel_real - before.monel_real));
                            }

                            $('#pre_2').html(before.monel_real);
                            $('#now_2').html(now.monel_real);
                            if(before.monel_real > now.monel_real){
                                $("#rate2").html('-'+ (before.monel_real - now.monel_real));
                            }
                            else{
                                $("#rate2").html('+'+ (now.monel_real - before.monel_real));
                            }

                            $('#pre_3').html(before.money_sold);
                            $('#now_3').html(now.money_sold);
                            if(before.money_sold > now.money_sold){
                                $("#rate3").html('-'+ (before.money_sold - now.money_sold));
                            }
                            else{
                                $("#rate3").html('+'+ (now.money_sold - before.money_sold));
                            }

                            $('#pre_4').html(before.money_return);
                            $('#now_4').html(now.money_return);
                            if(before.money_return > now.money_return){
                                $("#rate4").html('-'+ (before.money_return - now.money_return));
                            }
                            else{
                                $("#rate4").html('+'+ (now.money_return - before.money_return));
                            }

                            $('#pre_5').html(before.fee_sale);
                            $('#now_5').html(now.fee_sale);
                            if(before.fee_sale > now.fee_sale){
                                $("#rate5").html('-'+ (before.fee_sale - now.fee_sale));
                            }
                            else{
                                $("#rate5").html('+'+ (now.fee_sale - before.fee_sale));
                            }

                            $('#pre_6').html(before.actual_cost);
                            $('#now_6').html(now.actual_cost);
                            if(before.actual_cost > now.actual_cost){
                                $("#rate6").html('-'+ (before.actual_cost - now.actual_cost));
                            }
                            else{
                                $("#rate6").html('+'+ (now.actual_cost - before.actual_cost));
                            }

                            $('#pre_7').html(before.fee_ship);
                            $('#now_7').html(now.fee_ship);
                            if(before.fee_ship > now.fee_ship){
                                $("#rate7").html('-'+ (before.fee_ship - now.fee_ship));
                            }
                            else{
                                $("#rate7").html('+'+ (now.fee_ship - before.fee_ship));
                            }

                            $('#pre_9').html(before.profit);
                            $('#now_9').html(now.profit);
                            if(before.profit > now.profit){
                                $("#rate_9").html('-'+ (before.profit - now.profit));
                            }
                            else{
                                $("#rate_9").html('+'+ (now.profit - before.profit));
                            }

                            

                        }).fail(function(error) {
                            // Xử lý lỗi nếu cần
                            console.error("API Error:", error);
                        }).always(function() {
                            // Xử lý dù API có thành công hay thất bại
                            console.log("API Call Done!");
                        });
                });

            });
        }
    }
};
(() => {
/*     View.doiSoat.activeClick();
    
    View.doiSoat.setStatus().then(ticketID => {
        View.doiSoat.showDetail(ticketID);
    }); */
    ViewReport.Financial.set();
})();