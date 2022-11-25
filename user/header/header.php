<head>
    <style>
        .quick-link{
            background: linear-gradient(145deg, #FF3252, lightskyblue);
            padding: 10px 25px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .sub-head{
            font-size: 14px;
            color: grey;
        }
        .sub-head-info{
            font-size: 25px;
            color: #FF3252;
        }
        @media screen and (max-width: 767px) {
            .second-top{
                margin-top: 20px;
                border-top: 1px solid #f1f1f1;
            }
        }
        @media screen and (min-width: 768px) {
            .quick-link{
                padding: 10px 40px;
            }
        }
    </style>
</head>

<section class="pt-4 header-sect row pl-5">
    <div class="col-12 col-md-9 text-center">
        <div class="col-12 row justify-content-center align-items-center">
            <div class="col-12 names">
                <span class="h3"><?= $_SESSION['fname']." ".$_SESSION['lname']; ?></span>
                <div class="h6 pt-2"><?= $_SESSION['username']; ?></div>
            </div>
        </div>
        <div class="row col-12 col-md-12 links justify-content-around pt-3">
            <div class="col-5">
                <a href="deposit.php" class="quick-top quick-link"><sup>$</sup> Top up</a>
            </div>
            <div class="col-5">
                <a href="packages.php" class="quick-invest quick-link"><sup>$</sup> Invest</a>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-md-3 second-top row justify-content-around pt-3">
        <div class="col-5 col-md-12 col-lg-12 text-center">
            <div class="sub-head">Balance</div>
            <span class="sub-head-info"><sup>$</sup><?= $wallet_balance; ?>.<small>00</small></span>
        </div>
        <div class="col-5 col-md-12 col-lg-12 text-center">
            <div class="sub-head">Running</div>
            <span class="sub-head-info">None</span>
        </div>
    </div>

</section>

<hr>