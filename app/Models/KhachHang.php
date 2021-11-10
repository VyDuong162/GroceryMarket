<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PhuongXa;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class KhachHang extends Model implements AuthenticatableContract
{
    use HasFactory;
    protected $table ='khachhang';
    protected $fillable =['kh_hoTen','kh_gioiTinh','kh_soDienThoai','kh_email','kh_taiKhoan','kh_trangThai','vt_ma','px_ma','created_at','updated_at'];
    protected $hidden = [ 'kh_matKhau'];
    protected $guarded = ['kh_ma'];

    protected $primaryKey='kh_ma';
    public $timestamps =false;
   
    protected $dates =['kh_ngaySinh','created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    
    public function layphuongxa(){
        return $this->attributes['px_ma'];
    }
    public function vaitro(){
        return $this->belongsTo('App\Models\VaiTro','vt_ma','vt_ma');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\Models\KhachHang','kh_ma','kh_ma');
    }
    public function donhangs(){
        return $this->hasMany('App\Models\DonHang','kh_ma','kh_ma');
    }
    public function phoneNumber($number) {
        return "".substr($number, 0, 3)." ".substr($number, 3, 3)." ".substr($number,6);
    }
    public function laydiachi($px_ma){
        $diachi = PhuongXa::select(DB::raw('CONCAT(px_ten ,", ",qh_ten ,", ",ttp_ten) as diachi'))
                            ->JOIN('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                            ->JOIN('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma') 
                            ->where('phuongxa.px_ma','=',$px_ma)
                            ->get('diachi');
      
        return $diachi;
    }
    public function cuahangtaphoas(){
        return $this->belongsTo('App\Models\CuaHangTapHoa','kh_ma','kh_ma');
    }
    public function diachis(){
        return $this->hasMany('App\Models\DiaChi','kh_ma','kh_ma');
    }
    public function phuongxa(){
        return $this->belongsTo('App\Models\PhuongXa','px_ma','px_ma');
    }
    public function gopys(){
        return $this->hasMany('App\Models\GopY','kh_ma','kh_ma');
    }
    public function yeuthichs(){
        return $this->hasMany('App\Models\YeuThich','kh_ma','kh_ma');
    }
     /**
     * Tên cột 'Ghi nhớ đăng nhập'
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = 'kh_ghinhodangnhap';
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }
    /**
     * Hàm trả về tên cột dùng để tim `Mật khẩu`
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->kh_matKhau;
    }
    /**
     * Hàm dùng để trả về giá trị của cột "kh_ghinhodangnhap" session.
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
    }
    /**
     * Hàm dùng để set giá trị cho cột "kh_ghinhodangnhap" session.
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
    }
    /**
     * Hàm trả về tên cột dùng để chứa REMEMBER TOKEN
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['kh_matKhau'] = bcrypt($value);
    }
}
