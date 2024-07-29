<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    // Chỉ định tên bảng trong database
    protected $table = 'products';
    // Phương thức chỉ định thuộc tính được gán giá trị khi sử dụng create, update
    protected $fillable = [
        'name',
        'image',
        'price',
        'quantity',
        'mota',
        'category_id',
        'views'
    ];

    // Phương thức liên kết với bảng categories để lấy thông tin
    public function categories(): BelongsTo
    {
        // Phương thức belongsTo->xác định mối quan hệ
        // Categories->tên lớp mô hình được định nghĩa trong file Categories trong tệp Model
        // category_id->tên trường liên kết với bảng categories
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
