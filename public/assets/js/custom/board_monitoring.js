$(document).ready(function(){
    let curr = new Date
    let week = []

    for (let i = 1; i <= 7; i++) {
        let first = curr.getDate() - curr.getDay() + i
        let day = new Date(curr.setDate(first)).toISOString().slice(0, 10)
        week.push(day)

        $("#"+i).html(moment(day). format('DD MMM YYYY'))
    }

    $.ajax({
        type: 'GET',
        url: baseUrl+'/get_board_monitoring',
        dataType: 'json',
        success: function (data) {
            var row = ''
            var detail_row = 1
            for(let j = 0; j < data.length; j++){
                row = '<tr>'+
                        '<td class="text-center" rowspan="4">'+j+1+'</td>'+
                        '<td class="text-center" rowspan="4">'+data[j].vehicle_name+'</td>'+
                        '<td>Penyewa</td>'

                for(let k = 1; k <= 4; k++){
                    for(let l = 1; l <= 7; l++){
                        if(k == 1){
                            if(data.details[l].date_start == week[l]){
                                
                            }
                        }
                    }
                }
            }
        },
        error:function(data){
            console.log(data);
        }
    });
})
