from fastapi import FastAPI

from .database import Base, engine
from .routers.students import router as student_router


Base.metadata.create_all(bind=engine)


app = FastAPI(
    title="Student Management API"
)


@app.get("/student")
def home():

    return {
        "message": "Student Management API is running"
    }


app.include_router(student_router)