<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = $request->getUri()->getPath();

        $kecuali = [
            'admin/login',
            'admin/attemptAdminLogin',
            'auth/adminLogin',
            'auth/attemptAdminLogin'
        ];

        foreach ($kecuali as $k) {
            if (strpos(strtolower($uri), strtolower($k)) !== false) {
                return;
            }
        }

        if (!session()->get('isLoggedIn') || !in_array(session()->get('role'), ['admin', 'pimpinan'])) {
            return redirect()->to(base_url('admin/login'))->with('error', 'Sesi telah habis, silakan login kembali.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
