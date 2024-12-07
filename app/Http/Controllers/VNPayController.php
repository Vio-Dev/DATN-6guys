<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function vnpay_payment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_HashSecret = "7SK608K0D1YZ5Q73RP2HOWY3U3UZZLN1"; // Chuỗi bí mật
        $vnp_TmnCode = "IHN59CU0"; // Mã website tại VNPay
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php"; // URL return khi thanh toán xong
        
        $vnp_TxnRef = "1000000"; // Mã đơn hàng
        $vnp_OrderInfo = "thanh toán vn pay";
        $vnp_OrderType = "6guys shop";
        $vnp_Amount = 1000 * 100; // Số tiền cần thanh toán
        $vnp_Locale = "vn"; // Ngôn ngữ
        $vnp_BankCode = $request->input('bank_code'); // Lấy mã ngân hàng từ form
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];      

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $hashdata = urldecode(http_build_query($inputData)); // Mã hóa query string

        // Thay đổi ở đây để mã hóa URL đúng cách
        $hashdata = implode('&', array_map(
            fn($key, $value) => $key . '=' . urlencode($value),  // Chèn urlencode() vào đây
            array_keys($inputData),
            array_values($inputData)
        ));

        // Tạo query string đã mã hóa
        $query = http_build_query($inputData);

        // Mã hóa URL và thêm tham số vnp_SecureHash
        $vnp_Url = $vnp_Url . "?" . urlencode($query); // Mã hóa cả URL
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        // Log dữ liệu để kiểm tra
        // dd(['hashdata' => $hashdata, 'vnp_Url' => $vnp_Url, 'secure_hash' => $vnpSecureHash]);

        if ($request->has('redirect')) {
            return redirect($vnp_Url);
        } else {
            return response()->json([
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
            ]);
        }
    }
}


