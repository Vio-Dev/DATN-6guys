<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Các thông báo lỗi mặc định được sử dụng cho các quy tắc xác thực.
    | Bạn có thể thay đổi chúng để phù hợp với ứng dụng của bạn.
    |
    */
    
    'accepted' => 'The :attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày bằng hoặc sau :date.',
    'alpha' => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ có thể chứa các chữ cái, số và dấu gạch ngang.',
    'alpha_num' => ':attribute chỉ có thể chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày bằng hoặc trước :date.',
    'between' => [
        'numeric' => ':attribute phải nằm trong khoảng từ :min đến :max.',
        'file' => ':attribute phải có kích thước từ :min đến :max kilobytes.',
        'string' => ':attribute phải có độ dài từ :min đến :max ký tự.',
        'array' => ':attribute phải có từ :min đến :max phần tử.',
    ],
    'boolean' => ':attribute phải là true hoặc false.',
    'confirmed' => 'Xác nhận :attribute không khớp.',
    'date' => ':attribute không phải là một ngày hợp lệ.',
    'date_equals' => ':attribute phải là ngày :date.',
    'date_format' => ':attribute không đúng định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute phải có :digits chữ số.',
    'digits_between' => ':attribute phải có từ :min đến :max chữ số.',
    'dimensions' => ':attribute có kích thước ảnh không hợp lệ.',
    'distinct' => ':attribute có giá trị trùng lặp.',
    'email' => ':attribute phải là một email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong các giá trị sau: :values.',
    'exists' => ':attribute không hợp lệ.',
    'file' => ':attribute phải là một tệp.',
    'filled' => ':attribute là bắt buộc.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải có kích thước lớn hơn :value kilobytes.',
        'string' => ':attribute phải dài hơn :value ký tự.',
        'array' => ':attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải có kích thước lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải dài hơn hoặc bằng :value ký tự.',
        'array' => ':attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => ':attribute không hợp lệ.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là một số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải có kích thước nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải ngắn hơn :value ký tự.',
        'array' => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải có kích thước nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải ngắn hơn hoặc bằng :value ký tự.',
        'array' => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được dài hơn :max ký tự.',
        'array' => ':attribute không được có hơn :max phần tử.',
    ],
    'mimes' => ':attribute phải là một tệp có kiểu: :values.',
    'mimetypes' => ':attribute phải là một tệp có kiểu: :values.',
    'min' => [
        'numeric' => ':attribute phải ít nhất là :min.',
        'file' => ':attribute phải có kích thước ít nhất là :min kilobytes.',
        'string' => ':attribute phải có ít nhất :min ký tự.',
        'array' => ':attribute phải có ít nhất :min phần tử.',
    ],
    'not_in' => ':attribute không hợp lệ.',
    'not_regex' => 'Định dạng :attribute không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'password' => [
        'letters' => ':attribute phải chứa ít nhất một chữ cái.',
        'mixed' => ':attribute phải chứa ít nhất một chữ cái hoa và một chữ cái thường.',
        'numbers' => ':attribute phải chứa ít nhất một chữ số.',
        'symbols' => ':attribute phải chứa ít nhất một ký tự đặc biệt.',
        'uncompromised' => ':attribute bạn nhập vào đã bị xâm phạm. Vui lòng chọn một mật khẩu khác.',
    ],
    'present' => ':attribute phải có mặt.',
    'regex' => 'Định dạng :attribute không hợp lệ.',
    'required' => ':attribute là bắt buộc.',
    'required_if' => ':attribute là bắt buộc khi :other là :value.',
    'required_unless' => ':attribute là bắt buộc trừ khi :other là :value.',
    'required_with' => ':attribute là bắt buộc khi có :values.',
    'required_with_all' => ':attribute là bắt buộc khi có :values.',
    'required_without' => ':attribute là bắt buộc khi không có :values.',
    'required_without_all' => ':attribute là bắt buộc khi không có bất kỳ giá trị nào trong :values.',
    'same' => ':attribute và :other phải giống nhau.',
    'size' => [
        'numeric' => ':attribute phải có kích thước là :size.',
        'file' => ':attribute phải có kích thước là :size kilobytes.',
        'string' => ':attribute phải có độ dài là :size ký tự.',
        'array' => ':attribute phải có :size phần tử.',
    ],
    'starts_with' => ':attribute phải bắt đầu với một trong các giá trị sau: :values.',
    'string' => ':attribute phải là một chuỗi ký tự.',
    'timezone' => ':attribute phải là một múi giờ hợp lệ.',
    'unique' => ':attribute đã được sử dụng.',
    'uploaded' => ':attribute tải lên không thành công.',
    'url' => ':attribute phải là một URL hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Đây là nơi bạn có thể tùy chỉnh các thông báo lỗi cho các quy tắc xác thực
    | hoặc các thuộc tính khác.
    |
    */

    'custom' => [
        'name' => [
            'required' => 'Tên người dùng là bắt buộc.',
        ],
        'email' => [
            'required' => 'Email là bắt buộc.',
            'email' => 'Email phải có định dạng hợp lệ.',
            'unique' => 'Email đã được sử dụng.',
        ],
        'password' => [
            'required' => 'Mật khẩu là bắt buộc.',
            'min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'confirmed' => 'Mật khẩu xác nhận không khớp.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | Đây là nơi bạn có thể định nghĩa các tên trường để thay thế các từ khóa mặc định
    | bằng các tên dễ hiểu hơn.
    |
    */

    'attributes' => [
        'name' => 'Tên người dùng',
        'email' => 'Email người dùng',
        'password' => 'Mật khẩu',
    ],

];
