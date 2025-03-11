import axios from 'axios';

const toggle = async (id: number, done: boolean): Promise<number> => {

    const res = await axios.put('/api/todo/toggle', { id, done, }, {
        headers: {
            "Content-Type": 'application/json; charset=utf-8',
        },
        withCredentials: true,
    });

    return res.status;
}

const onCheckChange = async (event: Event): Promise<void> => {

    if (event.type !== 'change') {

        throw Error('changeイベントに設定してください');
    }

    if (event.target instanceof HTMLInputElement === false) {

        throw Error('input要素ではありません');
    }

    if (
        event.target.hasAttribute('todo-id') === false ||
        event.target.getAttribute('todo-id') === null
    ) {
        throw Error('todo-id属性が設定されていません');
    }

    const attrId = event.target.getAttribute('todo-id')!;

    if (/^[1-9]+\d*$/.test(attrId) === false) {

        throw Error(`todo-id属性の値が不正です todo-id: ${attrId}`);
    }

    const id = Number.parseInt(attrId);

    const done = event.target.checked;

    const status = await toggle(id, done);

    if (status < 200 ||  300 <= status) {

        alert('更新に失敗しました。通信状況を見てもう一度お試しください');

        event.target.checked = !done;

        if (500 <= status) {

            console.error(`サーバーエラーが発生しました\nステータス: ${status}`);
        }

        return;
    }
}

window.addEventListener('DOMContentLoaded', () => {

    const todoCheckBoxes = document.querySelectorAll<HTMLInputElement>('.todo-done');

    for (const checkbox of todoCheckBoxes) {

        checkbox.addEventListener('change', onCheckChange);
    }
});
