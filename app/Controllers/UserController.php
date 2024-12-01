<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

/*Unidad IV Actividad Integradora. Modelo Vista Controlador 
 
 Alumno: Joselyn Correa Jiménez 
 Asesor: Luis Eduardo Alvarez Becerra 
 Materia: Lenguajes de programación Back End 
 Fecha de entrega:  20 de noviembre 2024
 
 Conclusión:
 Los conocimientos de esta unidad nos permitieron desarrollar un módulo completo y funcional para la gestión 
 de archivos de imagen en PHP dentro de un marco de trabajo MVC. Este proceso fortalece las habilidades técnicas. 
 Teniendo como resultado, un panel de administración que permite al usuario realizar tareas como agregar y eliminar imágenes.
 
 Referencias: 
 Ortiz, J. P. (2020). Tutorial de Codeigniter. [Tutorial]. UDGVirtual.

*/

class UserController extends Controller
{
    public function login()
    {
        $session = session();
        $model = new UserModel();
    

        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('email', $email)->first();
           
            
            if ($user && ($password === $user['password'])) {
                $session->set([
                    'user_id'   => $user['id'],
                    'user_name'  => $user['name'],
                    'user_email' => $user['email'],
                    'user_type' => $user['type'],
                    'user_login' => true
                ]);

                return redirect()->to('dashboard');
            } else {
                $session->setFlashdata('error', 'Credenciales incorrectas.');
                return redirect()->back();
            }
        }

        return view('login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
