<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class PendaftarFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (!session()->get('isLoggedIn') || !session()->get('id_pendaftar')) {
            return redirect()->to(base_url('login'))->with('error', 'Sesi Anda telah berakhir atau Anda belum login. Silakan login kembali.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
