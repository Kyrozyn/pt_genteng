<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\kendaraan
 *
 * @property int $id
 * @property string $nama
 * @property string $no_plat
 * @property int $kapasitas
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan query()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereKapasitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereNoPlat($value)
 */
	class kendaraan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\pelanggan
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan query()
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pelanggan whereNoTelp($value)
 */
	class pelanggan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\pemesanan
 *
 * @property int $id
 * @property int $pelanggan_id
 * @property string $tanggal_pengiriman
 * @property string $keterangan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\produk[] $produk
 * @property-read int|null $produk_count
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan wherePelangganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan whereTanggalPengiriman($value)
 */
	class pemesanan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\pemesanan_produk
 *
 * @property int $id
 * @property int $pemesanan_id
 * @property int $produk_id
 * @property int $jumlah
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk wherePemesananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pemesanan_produk whereProdukId($value)
 */
	class pemesanan_produk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\produk
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $satuan
 * @property string $stok
 * @method static \Illuminate\Database\Eloquent\Builder|produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|produk whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produk whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produk whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|produk whereStok($value)
 */
	class produk extends \Eloquent {}
}

