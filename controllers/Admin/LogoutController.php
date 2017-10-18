<?php
/**
 * Created by IntelliJ IDEA.
 * User: gustavo
 * Date: 17/10/17
 * Time: 18:00
 */

namespace Http\Admin;

use App\Controller;
class LogoutController extends Controller
{
    /**
     *
     */
    public function logout()
    {
        $this->session->logout('admin');
    }
}
