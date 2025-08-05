// --- Page Components (คอมโพเนนต์หน้าต่างๆ) ---

const LoginPage = ({ onLogin }) => {
    return (
        <div className="min-h-screen bg-gray-100 flex flex-col justify-center items-center p-4" style={{ fontFamily: "'Sarabun', sans-serif" }}>
            <div className="w-full max-w-sm">
                <div className="flex justify-center items-center mb-6">
                    <img src="https://placehold.co/60x60/1D4ED8/FFFFFF?text=ตรา" alt="โลโก้หน่วยงาน" className="rounded-full" />
                    <h1 className="ml-4 text-2xl font-bold text-gray-800">ระบบสำนักงานอิเล็กทรอนิกส์</h1>
                </div>
                <div className="bg-white p-8 rounded-2xl shadow-lg">
                    <h2 className="text-xl font-bold text-center text-gray-700 mb-2">เข้าสู่ระบบ</h2>
                    <p className="text-center text-gray-500 mb-6 text-sm">กรุณาใส่ชื่อผู้ใช้และรหัสผ่านของท่าน</p>
                    <form onSubmit={(e) => { e.preventDefault(); onLogin(); }}>
                        <div className="mb-4">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">ชื่อผู้ใช้</label>
                            <input className="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="username" type="text" placeholder="username" defaultValue="somchai" />
                        </div>
                        <div className="mb-6">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="password">รหัสผ่าน</label>
                            <input className="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" type="password" placeholder="******************" defaultValue="password" />
                        </div>
                        <div className="flex items-center justify-between">
                            <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-colors" type="submit">
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </form>
                </div>
                <p className="text-center text-gray-500 text-xs mt-6">&copy;2568 หน่วยงานราชการไทย</p>
            </div>
        </div>
    );
};
