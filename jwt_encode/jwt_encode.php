<?php

// Hàm tạo JWT token
function createJwtToken($payload, $secret_key) {
    // Base64URL encode header và payload
    $base64UrlHeader = base64UrlEncode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
    $base64UrlPayload = base64UrlEncode(json_encode($payload));

    // Tạo signature
    $signature = hash_hmac('sha256', "$base64UrlHeader.$base64UrlPayload", $secret_key, true);
    $base64UrlSignature = base64UrlEncode($signature);

    // Ghép các phần lại để tạo token
    $jwtToken = "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";

    return $jwtToken;
}

// Hàm giải mã JWT token
function verifyJwtToken($token, $secret_key) {
    list($header, $payload, $signature) = explode('.', $token);

    // Kiểm tra chữ ký
    $base64UrlHeader = base64UrlDecode($header);
    $base64UrlPayload = base64UrlDecode($payload);
    $signatureToVerify = hash_hmac('sha256', "$header.$payload", $secret_key, true);
    $base64UrlSignatureToVerify = base64UrlEncode($signatureToVerify);

    // So sánh chữ ký
    if ($base64UrlSignatureToVerify === $signature) {
        // Chữ ký hợp lệ
        return json_decode($base64UrlPayload, true);
    } else {
        // Chữ ký không hợp lệ
        return null;
    }
}

// Hàm base64URL encode
function base64UrlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

// Hàm base64URL decode
function base64UrlDecode($base64Url) {
    $padding = strlen($base64Url) % 4;
    if ($padding) {
        $base64Url .= str_repeat('=', 4 - $padding);
    }
    return base64_decode(strtr($base64Url, '-_', '+/'));
}




// Sử dụng các hàm để tạo và xác thực JWT token
// $secret_key = 'your_secret_key'; // Đặt một key bí mật an toàn

// Tạo payload
// $payload = array(
//     "user_id" => 123,
//     "username" => "john_doe",
//     "role" => "admin"
// );

// Tạo JWT token
// $jwtToken = createJwtToken($payload, $secret_key);
// echo "JWT Token: $jwtToken\n";

// Giải mã và xác thực token
// $decodedPayload = verifyJwtToken($jwtToken, $secret_key);

// if ($decodedPayload) {
//     echo "Decoded Payload:\n";
//     print_r($decodedPayload);
// } else {
//     echo "Token không hợp lệ.\n";
// }
?>