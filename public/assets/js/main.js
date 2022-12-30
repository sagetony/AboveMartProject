function updatepaymentMethod() {
    var select = document.getElementById("payment")

    var option = select.options[select.selectedIndex]

    if (option.value == "wallet") {
        document.getElementById("walletpayment").style.display = "block"
        document.getElementById("promopayment").style.display = "none"
        document.getElementById("epinpayment").style.display = "none"
    } else if (option.value == "promo") {
        document.getElementById("walletpayment").style.display = "none"
        document.getElementById("promopayment").style.display = "block"
        document.getElementById("epinpayment").style.display = "none"
    } else if (option.value == "epin") {
        document.getElementById("walletpayment").style.display = "none"
        document.getElementById("promopayment").style.display = "none"
        document.getElementById("epinpayment").style.display = "block"
    } else {
        document.getElementById("walletpayment").style.display = "none"
        document.getElementById("promopayment").style.display = "none"
        document.getElementById("epinpayment").style.display = "none"
    }
}

function update() {
    var select = document.getElementById("network")
    var option = select.options[select.selectedIndex]
    document.getElementById("amount").style.display = "block"
    if (option.value == "mtn") {
        document.getElementById("mtn").style.display = "block"
        document.getElementById("airtel").style.display = "none"
        document.getElementById("glo").style.display = "none"
        document.getElementById("9mobile").style.display = "none"
    } else if (option.value == "airtel") {
        document.getElementById("airtel").style.display = "block"
        document.getElementById("glo").style.display = "none"
        document.getElementById("9mobile").style.display = "none"
        document.getElementById("mtn").style.display = "none"
    } else if (option.value == "glo") {
        document.getElementById("glo").style.display = "block"
        document.getElementById("9mobile").style.display = "none"
        document.getElementById("mtn").style.display = "none"
        document.getElementById("airtel").style.display = "none"
    } else if (option.value == "9mobile") {
        document.getElementById("9mobile").style.display = "block"
        document.getElementById("mtn").style.display = "none"
        document.getElementById("airtel").style.display = "none"
        document.getElementById("glo").style.display = "none"
    }
}

let mtn_75mb_24hrs = 100
let mtn_1gb_24hrs = 300
let mtn_200mb_2days = 200
let mtn_2_5gb_2days = 500
let mtn_350mb_7days = 300
let mtn_1gb_7days = 500
let mtn_6gb_7_days = 1500
let mtn_750mb_14days = 500
let mtn_1_5gb_30days = 1000
let mtn_2gb_30_days = 1200
let mtn_3gb_30days = 1500
let mtn_4_5gb_30days = 2000
let mtn_6gb_30days = 2500
let mtn_8gb_30days = 3000
let mtn_10gb_30days = 3500
let mtn_15gb_30_days = 5000
let mtn_20gb_30_days = 6000
let mtn_40gb = 10000
let mtn_75gb_30days = 15000
let mtn_110gb_30days = 20000
let mtn_75gb_60days = 20000
let mtn_120gb_60days = 30000
let mtn_150gb_90_days = 50000
let mtn_250gb_90days = 75000
let mtn_400gb_365days = 120000
let mtn_1000gb_365days = 250000
let mtn_2000gb_365days = 450000
let glo_100mb_1_day = 100
let glo_350mb_2_days = 200
let glo_1_35gb_14days = 500
let glo_2_5gb = 1000
let glo_3_75gb = 1500
let glo_5_8_gb = 2000
let glo_7_7_gb = 2500
let glo_10gb = 3000
let glo_13_5_gb = 4000
let glo_1825gb = 5000
let glo_259gb = 8000
let glo_50gb = 10000
let glo_93gb = 15000
let glo_119gb = 18000
let glo_138gb = 20000
let airtel_75mb10_extra_24hrs = 100
let airtel_1gb__1day = 300
let airtel_2gb__2days = 500
let airtel_200mb_3days = 200
let airtel_350mb__10_extra_7days = 300
let airtel_6gb_7days = 1500
let airtel_750mb = 500
let airtel_1_5gb = 1000
let airtel_2gb_30days = 1200
let airtel_3gb__30days = 1500
let airtel_4_5gb_30days = 2000
let airtel_6gb__30days = 2500
let airtel_8gb_30days = 3000
let airtel_11gb_30days = 4000
let airtel_15gb = 5000
let airtel_40gb_30days = 10000
let airtel_75gb_30days = 15000
let airtel_110gb_30days = 20000
let mobile_100mb_24hrs = 100
let mobile_650mb_24hrs = 200
let mobile_7gb_7_days = 1500
let mobile_500mb_30days = 500
let mobile_1_5gb_30_days = 1000
let mobile_2gb_30days = 1200
let mobile_4_5gb_30_days = 2000
let mobile_11gb_30days = 4000
let mobile_15gb_30days = 5000
let mobile_40_gb_30_days = 10000
let mobile_75_gb_30_days = 15000
let mobile_30gb_90_days = 27500
let mobile_100gb_100_days = 84992
let mobile_60gb_180_days = 55000
let mobile_120gb_365_days = 110000

function insertAmount() {
    var select = document.getElementById("mtnData")
    var option = select.options[select.selectedIndex]

    if (option.value == "mtn_75mb_24hrs") {
        document.getElementById("amountV").value = mtn_75mb_24hrs
    } else if (option.value == "mtn_1gb_24hrs") {
        document.getElementById("amountV").value = mtn_1gb_24hrs
    } else if (option.value == "mtn_200mb_2days") {
        document.getElementById("amountV").value = mtn_200mb_2days
    } else if (option.value == "mtn_2_5gb_2days") {
        document.getElementById("amountV").value = mtn_2_5gb_2days
    } else if (option.value == "mtn_350mb_7days") {
        document.getElementById("amountV").value = mtn_350mb_7days
    } else if (option.value == "mtn_1gb_7days") {
        document.getElementById("amountV").value = mtn_1gb_7days
    } else if (option.value == "mtn_6gb_7_days") {
        document.getElementById("amountV").value = mtn_6gb_7_days
    } else if (option.value == "mtn_750mb_14days") {
        document.getElementById("amountV").value = mtn_750mb_14days
    } else if (option.value == "mtn_1_5gb_30days") {
        document.getElementById("amountV").value = mtn_1_5gb_30days
    } else if (option.value == "mtn_2gb_30_days") {
        document.getElementById("amountV").value = mtn_2gb_30_days
    } else if (option.value == "mtn_3gb_30days") {
        document.getElementById("amountV").value = mtn_3gb_30days
    } else if (option.value == "mtn_4_5gb_30days") {
        document.getElementById("amountV").value = mtn_4_5gb_30days
    } else if (option.value == "mtn_6gb_30days") {
        document.getElementById("amountV").value = mtn_6gb_30days
    } else if (option.value == "mtn_8gb_30days") {
        document.getElementById("amountV").value = mtn_8gb_30days
    } else if (option.value == "mtn_10gb_30days") {
        document.getElementById("amountV").value = mtn_10gb_30days
    } else if (option.value == "mtn_15gb_30_days") {
        document.getElementById("amountV").value = mtn_15gb_30_days
    } else if (option.value == "mtn_20gb_30_days") {
        document.getElementById("amountV").value = mtn_20gb_30_days
    } else if (option.value == "mtn_40gb") {
        document.getElementById("amountV").value = mtn_40gb
    } else if (option.value == "mtn_75gb_30days") {
        document.getElementById("amountV").value = mtn_75gb_30days
    } else if (option.value == "mtn_110gb_30days") {
        document.getElementById("amountV").value = mtn_110gb_30days
    } else if (option.value == "mtn_75gb_60days") {
        document.getElementById("amountV").value = mtn_75gb_60days
    } else if (option.value == "mtn_120gb_60days") {
        document.getElementById("amountV").value = mtn_120gb_60days
    } else if (option.value == "mtn_150gb_90_days") {
        document.getElementById("amountV").value = mtn_150gb_90_days
    } else if (option.value == "mtn_250gb_90days") {
        document.getElementById("amountV").value = mtn_250gb_90days
    } else if (option.value == "mtn_400gb_365days") {
        document.getElementById("amountV").value = mtn_400gb_365days
    } else if (option.value == "mtn_1000gb_365days") {
        document.getElementById("amountV").value = mtn_1000gb_365days
    } else if (option.value == "mtn_2000gb_365days") {
        document.getElementById("amountV").value = mtn_2000gb_365days
    } else {
        document.getElementById("amountV").value = 100
    }
}

function insertAAmount() {
    var select = document.getElementById("airtelData")
    var option = select.options[select.selectedIndex]
    if (option.value == "airtel_75mb10_extra_24hrs") {
        document.getElementById("amountV").value = airtel_75mb10_extra_24hrs
    } else if (option.value == "airtel_1gb__1day") {
        document.getElementById("amountV").value = airtel_1gb__1day
    } else if (option.value == "airtel_2gb__2days") {
        document.getElementById("amountV").value = airtel_2gb__2days
    } else if (option.value == "airtel_350mb__10_extra_7days") {
        document.getElementById("amountV").value = airtel_350mb__10_extra_7days
    } else if (option.value == "airtel_6gb_7days") {
        document.getElementById("amountV").value = airtel_6gb_7days
    } else if (option.value == "airtel_750mb") {
        document.getElementById("amountV").value = airtel_750mb
    } else if (option.value == "airtel_1_5gb") {
        document.getElementById("amountV").value = airtel_1_5gb
    } else if (option.value == "airtel_2gb_30days") {
        document.getElementById("amountV").value = airtel_2gb_30days
    } else if (option.value == "airtel_3gb__30days") {
        document.getElementById("amountV").value = airtel_3gb__30days
    } else if (option.value == "airtel_4_5gb_30days") {
        document.getElementById("amountV").value = airtel_4_5gb_30days
    } else if (option.value == "airtel_6gb__30days") {
        document.getElementById("amountV").value = airtel_6gb__30days
    } else if (option.value == "airtel_8gb_30days") {
        document.getElementById("amountV").value = airtel_8gb_30days
    } else if (option.value == "airtel_11gb_30days") {
        document.getElementById("amountV").value = airtel_11gb_30days
    } else if (option.value == "airtel_15gb") {
        document.getElementById("amountV").value = airtel_15gb
    } else if (option.value == "airtel_40gb_30days") {
        document.getElementById("amountV").value = airtel_40gb_30days
    } else if (option.value == "airtel_75gb_30days") {
        document.getElementById("amountV").value = airtel_75gb_30days
    } else if (option.value == "airtel_110gb_30days") {
        document.getElementById("amountV").value = airtel_110gb_30days
    } else {
        document.getElementById("amountV").value = 100
    }
}

function insertGAmount() {
    var select = document.getElementById("gloData")
    var option = select.options[select.selectedIndex]
    if (option.value == "glo_100mb_1_day") {
        document.getElementById("amountV").value = glo_100mb_1_day
    } else if (option.value == "glo_350mb_2_days") {
        document.getElementById("amountV").value = glo_350mb_2_days
    } else if (option.value == "glo_1_35gb_14days") {
        document.getElementById("amountV").value = glo_1_35gb_14days
    } else if (option.value == "glo_2_5gb") {
        document.getElementById("amountV").value = glo_2_5gb
    } else if (option.value == "glo_3_75gb") {
        document.getElementById("amountV").value = glo_3_75gb
    } else if (option.value == "glo_5_8_gb") {
        document.getElementById("amountV").value = glo_5_8_gb
    } else if (option.value == "glo_7_7_gb") {
        document.getElementById("amountV").value = glo_7_7_gb
    } else if (option.value == "glo_10gb") {
        document.getElementById("amountV").value = glo_10gb
    } else if (option.value == "glo_13_5_gb") {
        document.getElementById("amountV").value = glo_13_5_gb
    } else if (option.value == "glo_1825gb") {
        document.getElementById("amountV").value = glo_1825gb
    } else if (option.value == "glo_259gb") {
        document.getElementById("amountV").value = glo_259gb
    } else if (option.value == "glo_50gb") {
        document.getElementById("amountV").value = glo_50gb
    } else if (option.value == "glo_93gb") {
        document.getElementById("amountV").value = glo_93gb
    } else if (option.value == "glo_119gb") {
        document.getElementById("amountV").value = glo_119gb
    } else if (option.value == "glo_138gb") {
        document.getElementById("amountV").value = glo_138gb
    } else {
        document.getElementById("amountV").value = 100
    }
}
function insertMAmount() {
    var select = document.getElementById("9mobileData")
    var option = select.options[select.selectedIndex]
    if (option.value == "9mobile_100mb_24hrs") {
        document.getElementById("amountV").value = mobile_100mb_24hrs
    } else if (option.value == "9mobile_650mb_24hrs") {
        document.getElementById("amountV").value = mobile_650mb_24hrs
    } else if (option.value == "9mobile_7gb_7_days") {
        document.getElementById("amountV").value = mobile_7gb_7_days
    } else if (option.value == "9mobile_500mb_30days") {
        document.getElementById("amountV").value = mobile_500mb_30days
    } else if (option.value == "9mobile_1_5gb_30_days") {
        document.getElementById("amountV").value = mobile_1_5gb_30_days
    } else if (option.value == "9mobile_2gb_30days") {
        document.getElementById("amountV").value = mobile_2gb_30days
    } else if (option.value == "9mobile_4_5gb_30_days") {
        document.getElementById("amountV").value = mobile_4_5gb_30_days
    } else if (option.value == "9mobile_11gb_30days") {
        document.getElementById("amountV").value = mobile_11gb_30days
    } else if (option.value == "9mobile_15gb_30days") {
        document.getElementById("amountV").value = mobile_15gb_30days
    } else if (option.value == "9mobile_40_gb_30_days") {
        document.getElementById("amountV").value = mobile_40_gb_30_days
    } else if (option.value == "9mobile_75_gb_30_days") {
        document.getElementById("amountV").value = mobile_75_gb_30_days
    } else if (option.value == "9mobile_30gb_90_days") {
        document.getElementById("amountV").value = mobile_30gb_90_days
    } else if (option.value == "9mobile_100gb_100_days") {
        document.getElementById("amountV").value = mobile_100gb_100_days
    } else if (option.value == "9mobile_60gb_180_days") {
        document.getElementById("amountV").value = mobile_60gb_180_days
    } else if (option.value == "9mobile_120gb_365_days") {
        document.getElementById("amountV").value = mobile_120gb_365_days
    } else {
        document.getElementById("amountV").value = 100
    }
}
