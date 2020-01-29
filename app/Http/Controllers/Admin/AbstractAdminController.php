<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use View;

abstract class AbstractAdminController extends Controller
{
    protected $viewPath;
    protected $needPaginate = true;
    protected $limit;
    protected $routeName;

    /**
     * Model name.
     *
     * @return string
     */
    abstract protected function model(): string;

    /**
     * @return string
     */
    abstract protected function createRequest(): string;

    /**
     * @return string
     */
    protected function updateRequest(): string
    {
        return $this->createRequest();
    }

    /**
     * @param $result
     * @param  Request  $request
     */
    protected function selectionIndexResult($result, Request $request)
    {
    }

    /**
     * @param $obj
     * @param  Request  $request
     * @return mixed
     */
    protected function fillStoreData($obj, Request $request): array
    {
        return $request->all();
    }

    /**
     * @param $obj
     * @param  Request  $request
     * @return mixed
     */
    protected function fillUpdateData($obj, Request $request): array
    {
        return $request->all();
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /** @var Builder|Model $result */
        $result = $this->model()::query();

        $this->selectionIndexResult($result, $request);

        $result->orderByDesc($result->getModel()->getKeyName());

        if ($this->needPaginate) {
            $result = $result->paginate($this->limit)->appends($request->query());
        } else {
            $result = $result->get();
        }

        $data = [
            'result' => $result,
            'viewPath' => $this->viewPath,
        ];

        return view($this->viewPath.'.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $model = $this->model();
        $obj = new $model;
        $data = [
            'obj' => $obj,
            'viewPath' => $this->viewPath,
            'routeName' => $this->routeName,
        ];

        if (method_exists($this, 'viewDataForCreate')) {
            $data = array_merge($data, $this->viewDataForCreate($obj, $data));
        }

        return View::first([$this->viewPath.'.create', 'admin.form.create'], $data);
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        app($this->createRequest()); // Resolve request && validate

        $model = $this->model();
        $obj = new $model();

        $data = $this->fillStoreData($obj, $request);
        $obj->fill($data);

        if (method_exists($this, 'afterSuccessfulStore')) {
            $this->afterSuccessfulStore($obj, $request);
        }

        if ($obj->save()) {
            return redirect()->route($this->routeName . '.index')->with([
                'success' => 'Успешно добавлено'
                ]
            );
        } else {
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
    * @param $id
    * @return \Illuminate\Contracts\View\View
    */
    public function edit($id)
    {
        $obj = $this->model()::findOrFail($id);

        $data = [
            'obj' => $obj,
            'viewPath' => $this->viewPath,
            'routeName' => $this->routeName,
        ];

        if (method_exists($this, 'viewDataForEdit')) {
            $data = array_merge($data, $this->viewDataForEdit($obj, $data));
        }

        return View::first([$this->viewPath.'.edit', 'admin.form.edit'], $data);
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        $obj = $this->model()::findOrFail($id);
        $prevObj = clone $obj;

        app($this->updateRequest()); // Resolve request && validate

        $data = $this->fillUpdateData($obj, $request);

        if (method_exists($this, 'afterSuccessfulUpdate')) {
            call_user_func([$this, 'afterSuccessfulUpdate'], $obj, $request, $prevObj);
        }

        if ($obj->update($data)) {
            return redirect()->route($this->routeName . '.index')->with([
                    'success' => 'Успешно обновлено'
                ]
            );
        } else {
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $obj = $this->model()::findOrFail($id);

        if ($obj->delete()) {
            return redirect()->route($this->routeName . '.index')->with([
                    'success' => 'Успешно удалено'
                ]
            );
        }else {
            return redirect()->back();
        }
    }
}
